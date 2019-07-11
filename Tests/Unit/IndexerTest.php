<?php
declare(strict_types = 1);
namespace TYPO3\CMS\IndexedSearch\Tests\Unit;

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

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\IndexedSearch\Indexer;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class IndexerTest extends UnitTestCase
{
    /**
     * @var bool Reset singletons created by subject
     */
    protected $resetSingletonInstances = true;

    /**
     * @test
     */
    public function extractHyperLinksDoesNotReturnNonExistingLocalPath()
    {
        $html = 'test <a href="' . $this->getUniqueId() . '">test</a> test';
        $subject = new Indexer();
        $result = $subject->extractHyperLinks($html);
        $this->assertEquals(1, count($result));
        $this->assertEquals('', $result[0]['localPath']);
    }

    /**
     * @test
     */
    public function extractHyperLinksReturnsCorrectPathWithBaseUrl()
    {
        $baseURL = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
        $html = 'test <a href="' . $baseURL . 'index.php">test</a> test';
        $subject = new Indexer();
        $result = $subject->extractHyperLinks($html);
        $this->assertEquals(1, count($result));
        $this->assertEquals(Environment::getPublicPath() . '/index.php', $result[0]['localPath']);
    }

    /**
     * @test
     */
    public function extractHyperLinksFindsCorrectPathWithAbsolutePath()
    {
        $html = 'test <a href="index.php">test</a> test';
        $subject = new Indexer();
        $result = $subject->extractHyperLinks($html);
        $this->assertEquals(1, count($result));
        $this->assertEquals(Environment::getPublicPath() . '/index.php', $result[0]['localPath']);
    }

    /**
     * @test
     */
    public function extractHyperLinksFindsCorrectPathForPathWithinTypo3Directory()
    {
        $html = 'test <a href="typo3/index.php">test</a> test';
        $subject = new Indexer();
        $result = $subject->extractHyperLinks($html);
        $this->assertEquals(1, count($result));
        $this->assertEquals(Environment::getPublicPath() . '/typo3/index.php', $result[0]['localPath']);
    }

    /**
     * @test
     */
    public function extractHyperLinksFindsCorrectPathUsingAbsRefPrefix()
    {
        $absRefPrefix = '/' . $this->getUniqueId();
        $html = 'test <a href="' . $absRefPrefix . 'index.php">test</a> test';
        $GLOBALS['TSFE'] = $this->createMock(TypoScriptFrontendController::class);
        $config = [
            'config' => [
                'absRefPrefix' => $absRefPrefix,
            ],
        ];
        $GLOBALS['TSFE']->config = $config;
        $subject = new Indexer();
        $result = $subject->extractHyperLinks($html);
        $this->assertEquals(1, count($result));
        $this->assertEquals(Environment::getPublicPath() . '/index.php', $result[0]['localPath']);
    }

    /**
     * @test
     */
    public function extractBaseHrefExtractsBaseHref()
    {
        $baseHref = 'http://example.com/';
        $html = '<html><head><Base Href="' . $baseHref . '" /></head></html>';
        $subject = new Indexer();
        $result = $subject->extractBaseHref($html);
        $this->assertEquals($baseHref, $result);
    }

    /**
     * Tests whether indexer can extract content between "TYPO3SEARCH_begin" and "TYPO3SEARCH_end" markers
     *
     * @test
     */
    public function typoSearchTagsRemovesBodyContentOutsideMarkers()
    {
        $body = <<<EOT
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Some Title</title>
<link href='css/normalize.css' rel='stylesheet' type='text/css'/>
</head>
<body>
<div>
<div class="non_searchable">
    not searchable content
</div>
<!--TYPO3SEARCH_begin-->
<div class="searchable">
    lorem ipsum
</div>
<!--TYPO3SEARCH_end-->
<div class="non_searchable">
    not searchable content
</div>
</body>
</html>
EOT;
        $expected = <<<EOT

<div class="searchable">
    lorem ipsum
</div>

EOT;

        $subject = new Indexer();
        $result = $subject->typoSearchTags($body);
        $this->assertTrue($result);
        $this->assertEquals($expected, $body);
    }

    /**
     * Tests whether indexer can extract content between multiple pairs of "TYPO3SEARCH" markers
     *
     * @test
     */
    public function typoSearchTagsHandlesMultipleMarkerPairs()
    {
        $body = <<<EOT
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Some Title</title>
<link href='css/normalize.css' rel='stylesheet' type='text/css'/>
</head>
<body>
<div>
<div class="non_searchable">
    not searchable content
</div>
<!--TYPO3SEARCH_begin-->
<div class="searchable">
    lorem ipsum
</div>
<!--TYPO3SEARCH_end-->
<div class="non_searchable">
    not searchable content
</div>
<!--TYPO3SEARCH_begin-->
<div class="searchable">
    lorem ipsum2
</div>
<!--TYPO3SEARCH_end-->
<div class="non_searchable">
    not searchable content
</div>
</body>
</html>
EOT;
        $expected = <<<EOT

<div class="searchable">
    lorem ipsum
</div>

<div class="searchable">
    lorem ipsum2
</div>

EOT;

        $subject = new Indexer();
        $result = $subject->typoSearchTags($body);
        $this->assertTrue($result);
        $this->assertEquals($expected, $body);
    }
}
