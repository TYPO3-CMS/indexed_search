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

namespace TYPO3\CMS\IndexedSearch\Type;

/**
 * @internal
 */
enum SectionType: int
{
    case WHOLE_SITE = 0;
    case ONLY_THIS_PAGE = -1;
    case TOP_AND_CHILDREN = -2;
    case LEVEL_TWO_AND_OUT = -3;
}
