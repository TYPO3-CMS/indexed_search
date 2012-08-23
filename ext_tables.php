<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}
\TYPO3\CMS\Core\Extension\ExtensionManager::addPlugin(array('LLL:EXT:indexed_search/locallang.php:mod_indexed_search', $_EXTKEY));
\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY] = 'layout,select_key,pages';
// Registers the Extbase plugin to be listed in the Backend.
if (\TYPO3\CMS\Core\Extension\ExtensionManager::isLoaded('extbase')) {
	$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'Pi2', 'Indexed Search (experimental)');
	$pluginSignature = strtolower($extensionName) . '_pi2';
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
}
if (TYPO3_MODE == 'BE') {
	\TYPO3\CMS\Core\Extension\ExtensionManager::addModule('tools', 'isearch', 'after:log', \TYPO3\CMS\Core\Extension\ExtensionManager::extPath($_EXTKEY) . 'mod/');
	\TYPO3\CMS\Core\Extension\ExtensionManager::insertModuleFunction('web_info', 'TYPO3\\CMS\\IndexedSearch\\Controller\\IndexedPagesController', \TYPO3\CMS\Core\Extension\ExtensionManager::extPath($_EXTKEY) . 'modfunc1/class.tx_indexedsearch_modfunc1.php', 'LLL:EXT:indexed_search/locallang.php:mod_indexed_search');
	\TYPO3\CMS\Core\Extension\ExtensionManager::insertModuleFunction('web_info', 'TYPO3\\CMS\\IndexedSearch\\Controller\\IndexingStatisticsController', \TYPO3\CMS\Core\Extension\ExtensionManager::extPath($_EXTKEY) . 'modfunc2/class.tx_indexedsearch_modfunc2.php', 'LLL:EXT:indexed_search/locallang.php:mod2_indexed_search');
}
\TYPO3\CMS\Core\Extension\ExtensionManager::allowTableOnStandardPages('index_config');
\TYPO3\CMS\Core\Extension\ExtensionManager::addLLrefForTCAdescr('index_config', 'EXT:indexed_search/locallang_csh_indexcfg.xml');
$TCA['index_config'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:indexed_search/locallang_db.php:index_config',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'type' => 'type',
		'default_sortby' => 'ORDER BY crdate',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime'
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Extension\ExtensionManager::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => 'default.gif'
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, starttime, title, description, type, depth, table2index, alternative_source_pid, get_params, chashcalc, filepath, extensions'
	)
);
?>