<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2001-2013 Kasper Skårhøj (kasperYYYY@typo3.com)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * Index search frontend
 *
 * Creates a searchform for indexed search. Indexing must be enabled
 * for this to make sense.
 *
 * @author 	Kasper Skårhøj <kasperYYYY@typo3.com>
 * @co-author 	Christian Jul Jensen <christian@typo3.com>
 */
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('indexed_search') . 'class.indexer.php';
/*
 * @deprecated since 6.0, the classname tx_indexedsearch and this file is obsolete
 * and will be removed with 6.2. The class was renamed and is now located at:
 * typo3/sysext/indexed_search/Classes/Controller/SearchFormController.php
 */
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('indexed_search') . 'Classes/Controller/SearchFormController.php';
?>