<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::addPlugin(Array('LLL:EXT:indexed_search/locallang.php:mod_indexed_search', $_EXTKEY));

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY] = 'layout,select_key,pages';

// Registers the Extbase plugin to be listed in the Backend.
if (t3lib_extMgm::isLoaded('extbase')) {
	$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
		Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Pi2',
			// the title shown in the backend dropdown field
		'Indexed Search (experimental)'
	);
	$pluginSignature = strtolower($extensionName) . '_pi2';
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
}

if (TYPO3_MODE=='BE')    {
	t3lib_extMgm::addModule('tools','isearch','after:log',t3lib_extMgm::extPath($_EXTKEY).'mod/');

	t3lib_extMgm::insertModuleFunction(
		'web_info',
		'tx_indexedsearch_modfunc1',
		t3lib_extMgm::extPath($_EXTKEY).'modfunc1/class.tx_indexedsearch_modfunc1.php',
		'LLL:EXT:indexed_search/locallang.php:mod_indexed_search'
	);
	t3lib_extMgm::insertModuleFunction(
		"web_info",
		"tx_indexedsearch_modfunc2",
		t3lib_extMgm::extPath($_EXTKEY)."modfunc2/class.tx_indexedsearch_modfunc2.php",
		"LLL:EXT:indexed_search/locallang.php:mod2_indexed_search"
	);
}

t3lib_extMgm::allowTableOnStandardPages('index_config');
t3lib_extMgm::addLLrefForTCAdescr('index_config','EXT:indexed_search/locallang_csh_indexcfg.xml');

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
			'starttime' => 'starttime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
		'iconfile' => 'default.gif',
	),
	'feInterface' => array(
		'fe_admin_fieldList' => 'hidden, starttime, title, description, type, depth, table2index, alternative_source_pid, get_params, chashcalc, filepath, extensions',
	)
);


	// Example of crawlerhook (see also ext_localconf.php!)
/*
	t3lib_div::loadTCA('index_config');
	$TCA['index_config']['columns']['type']['config']['items'][] =  Array('My Crawler hook!', 'tx_myext_example1');
	$TCA['index_config']['types']['tx_myext_example1'] = $TCA['index_config']['types']['0'];
*/

?>
