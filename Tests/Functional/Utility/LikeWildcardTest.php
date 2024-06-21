<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\IndexedSearch\Tests\Functional\Utility;

use Doctrine\DBAL\Platforms\MariaDBPlatform as DoctrineMariaDBPlatform;
use Doctrine\DBAL\Platforms\MySQLPlatform as DoctrineMySQLPlatform;
use Doctrine\DBAL\Platforms\PostgreSQLPlatform as DoctrinePostgreSQLPlatform;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\IndexedSearch\Utility\LikeWildcard;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

final class LikeWildcardTest extends FunctionalTestCase
{
    #[DataProvider('getLikeQueryPartDataProvider')]
    #[Test]
    public function getLikeQueryPart(string $tableName, string $fieldName, string $likeValue, LikeWildcard $subject, string $expected): void
    {
        $connection = $this->get(ConnectionPool::class)->getConnectionForTable($tableName);
        $databasePlatform = $connection->getDatabasePlatform();
        if ($databasePlatform instanceof DoctrinePostgreSQLPlatform) {
            $expected = str_replace('LIKE', 'ILIKE', $expected);
        }
        // MySQL has support for backslash escape sequences, the expected results needs to take
        // the additional quoting into account.
        if ($databasePlatform instanceof DoctrineMariaDBPlatform || $databasePlatform instanceof DoctrineMySQLPlatform) {
            $expected = addcslashes($expected, '\\');
        }
        $expected = $connection->quoteIdentifier($fieldName) . ' ' . $expected;
        if (!($databasePlatform instanceof DoctrinePostgreSQLPlatform)) {
            $expected .= ' ESCAPE ' . $connection->quote('\\');
        }
        self::assertSame($expected, $subject->getLikeQueryPart($tableName, $fieldName, $likeValue));
    }

    /**
     * Returns data sets for the test getLikeQueryPart
     * Each dataset is an array with the following elements:
     * - the table name
     * - the field name
     * - the search value
     * - the wildcard mode
     * - the expected result
     */
    public static function getLikeQueryPartDataProvider(): array
    {
        return [
            'no placeholders and no wildcard mode' => [
                'tt_content',
                'body',
                'searchstring',
                LikeWildcard::NONE,
                "LIKE 'searchstring'",
            ],
            'no placeholders and left wildcard mode' => [
                'tt_content',
                'body',
                'searchstring',
                LikeWildcard::LEFT,
                "LIKE '%searchstring'",
            ],
            'no placeholders and right wildcard mode' => [
                'tt_content',
                'body',
                'searchstring',
                LikeWildcard::RIGHT,
                "LIKE 'searchstring%'",
            ],
            'no placeholders and both wildcards mode' => [
                'tt_content',
                'body',
                'searchstring',
                LikeWildcard::BOTH,
                "LIKE '%searchstring%'",
            ],
            'underscore placeholder and left wildcard mode' => [
                'tt_content',
                'body',
                'search_string',
                LikeWildcard::LEFT,
                "LIKE '%search\\_string'",
            ],
            'percent placeholder and right wildcard mode' => [
                'tt_content',
                'body',
                'search%string',
                LikeWildcard::RIGHT,
                "LIKE 'search\\%string%'",
            ],
            'percent and underscore placeholder and both wildcards mode' => [
                'tt_content',
                'body',
                '_search%string_',
                LikeWildcard::RIGHT,
                "LIKE '\\_search\\%string\\_%'",
            ],
        ];
    }
}
