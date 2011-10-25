<?php

########################################################################
# Extension Manager/Repository config file for ext "indexed_search".
#
# Auto generated 25-10-2011 13:11
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Indexed Search Engine',
	'description' => 'Indexed Search Engine for TYPO3 pages, PDF-files, Word-files, HTML and text files. Provides a backend module for statistics of the indexer and a frontend plugin. Documentation can be found in the extension "doc_indexed_search".',
	'category' => 'plugin',
	'shy' => 0,
	'dependencies' => 'cms',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => 'mod,cli',
	'state' => 'stable',
	'internal' => 1,
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author' => 'Kasper Skaarhoj',
	'author_email' => 'kasperYYYY@typo3.com',
	'author_company' => 'Curby Soft Multimedia',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'version' => '2.13.0',
	'_md5_values_when_last_written' => 'a:56:{s:9:"ChangeLog";s:4:"7479";s:17:"class.crawler.php";s:4:"ec8d";s:25:"class.doublemetaphone.php";s:4:"f691";s:25:"class.external_parser.php";s:4:"ad1e";s:17:"class.indexer.php";s:4:"d169";s:15:"class.lexer.php";s:4:"c88d";s:21:"ext_conf_template.txt";s:4:"0c64";s:12:"ext_icon.gif";s:4:"4cbf";s:17:"ext_localconf.php";s:4:"4c42";s:14:"ext_tables.php";s:4:"3a84";s:14:"ext_tables.sql";s:4:"7084";s:28:"ext_typoscript_editorcfg.txt";s:4:"0a34";s:24:"ext_typoscript_setup.txt";s:4:"9b5f";s:13:"locallang.xlf";s:4:"94af";s:26:"locallang_csh_indexcfg.xlf";s:4:"5d7c";s:16:"locallang_db.xlf";s:4:"0a5e";s:7:"tca.php";s:4:"f24a";s:12:"cli/conf.php";s:4:"19fe";s:14:"doc/README.txt";s:4:"a737";s:12:"doc/TODO.txt";s:4:"c804";s:29:"example/class.crawlerhook.php";s:4:"6662";s:24:"example/class.pihook.php";s:4:"f7dd";s:46:"hooks/class.tx_indexedsearch_tslib_fe_hook.php";s:4:"1bb8";s:13:"mod/clear.gif";s:4:"cc11";s:12:"mod/conf.php";s:4:"7a2f";s:13:"mod/index.php";s:4:"378e";s:15:"mod/isearch.gif";s:4:"4cbf";s:21:"mod/locallang_mod.xlf";s:4:"e903";s:21:"mod/mod_template.html";s:4:"a7f2";s:44:"modfunc1/class.tx_indexedsearch_modfunc1.php";s:4:"1963";s:22:"modfunc1/locallang.xlf";s:4:"0abc";s:44:"modfunc2/class.tx_indexedsearch_modfunc2.php";s:4:"edce";s:22:"modfunc2/locallang.xlf";s:4:"6e83";s:29:"pi/class.tx_indexedsearch.php";s:4:"467f";s:21:"pi/considerations.txt";s:4:"e3df";s:22:"pi/indexed_search.tmpl";s:4:"4b28";s:16:"pi/locallang.xlf";s:4:"c0a4";s:20:"pi/template_css.tmpl";s:4:"5251";s:14:"pi/res/csv.gif";s:4:"6a23";s:14:"pi/res/doc.gif";s:4:"2ec9";s:15:"pi/res/html.gif";s:4:"5647";s:14:"pi/res/jpg.gif";s:4:"e8df";s:17:"pi/res/locked.gif";s:4:"c212";s:16:"pi/res/pages.gif";s:4:"1405";s:14:"pi/res/pdf.gif";s:4:"9451";s:14:"pi/res/pps.gif";s:4:"926b";s:14:"pi/res/ppt.gif";s:4:"ada5";s:14:"pi/res/rtf.gif";s:4:"f660";s:14:"pi/res/sxc.gif";s:4:"00a6";s:14:"pi/res/sxi.gif";s:4:"4223";s:14:"pi/res/sxw.gif";s:4:"4a8f";s:14:"pi/res/tif.gif";s:4:"533b";s:14:"pi/res/txt.gif";s:4:"0004";s:14:"pi/res/xls.gif";s:4:"f106";s:14:"pi/res/xml.gif";s:4:"c32d";s:38:"tests/tx_indexedsearch_indexerTest.php";s:4:"3bb1";}',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'php' => '5.3.0-0.0.0',
			'typo3' => '4.6.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'doc_indexed_search' => '',
		),
	),
	'suggests' => array(
	),
);

?>