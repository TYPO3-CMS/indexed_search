<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010-2011 Dmitry Dulepov (dmitry.dulepov@gmail.com)
 *  All rights reserved
 *
 *  This script is part of the Typo3 project. The Typo3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
require_once \TYPO3\CMS\Core\Extension\ExtensionManager::extPath('indexed_search', 'class.indexer.php');
/*
 * @deprecated since 6.0, the classname tx_indexedsearch_indexerTest and this file is obsolete
 * and will be removed by 7.0. The class was renamed and is now located at:
 * typo3/sysext/indexed_search/Tests/Unit/IndexerTest.php
 */
require_once \TYPO3\CMS\Core\Extension\ExtensionManager::extPath('indexed_search') . 'Tests/Unit/IndexerTest.php';
?>