<?php
if (!defined ('TYPO3_MODE'))     die ('Access denied.');

$TCA['index_config'] = Array (
    'ctrl' => $TCA['index_config']['ctrl'],
    'interface' => Array (
        'showRecordFieldList' => 'hidden,starttime,title,description,type,depth,table2index,alternative_source_pid,get_params,chashcalc,filepath,extensions'
    ),
    'feInterface' => $TCA['index_config']['feInterface'],
    'columns' => Array (
        'hidden' => Array (
            'label' => 'Disable',
            'config' => Array (
                'type' => 'check',
                'default' => '0'
            )
        ),
        'starttime' => Array (
            'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
            'config' => Array (
                'type' => 'input',
                'size' => '8',
                'max' => '20',
                'eval' => 'date',
                'default' => '0',
                'checkbox' => '0'
            )
        ),
        'title' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.title',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
                'eval' => 'required',
            )
        ),
        'description' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.description',
            'config' => Array (
                'type' => 'text',
                'cols' => '30',
                'rows' => '2',
            )
        ),
        'type' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type',
            'config' => Array (
                'type' => 'select',
                'items' => Array (
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.0', '0'),
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.1', '1'),
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.2', '2'),
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.3', '3'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'depth' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.depth',
            'config' => Array (
                'type' => 'select',
                'items' => Array (
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.0', '0'),
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.1', '1'),
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.2', '2'),
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.3', '3'),
                ),
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'table2index' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.table2index',
            'config' => Array (
                'type' => 'select',
                'items' => Array (
                    Array('LLL:EXT:indexed_search/locallang_db.php:index_config.table2index.I.0', '0'),
                ),
				'special' => 'tables',
                'size' => 1,
                'maxitems' => 1,
            )
        ),
        'alternative_source_pid' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.alternative_source_pid',
            'config' => Array (
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            )
        ),
        'get_params' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.get_params',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
            )
        ),
        'fieldlist' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.fields',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
            )
        ),
        'externalUrl' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.externalUrl',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
            )
        ),
        'chashcalc' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.chashcalc',
            'config' => Array (
                'type' => 'check',
            )
        ),
        'filepath' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.filepath',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
            )
        ),
        'extensions' => Array (
            'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.extensions',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
            )
        ),
    ),
    'types' => Array (
        '0' => Array('showitem' => 'title;;1;;2-2-2, description, type'),
        '1' => Array('showitem' => 'title;;1;;2-2-2, description, type;;;;3-3-3, table2index;;;;3-3-3, alternative_source_pid, fieldlist, get_params, chashcalc'),
        '2' => Array('showitem' => 'title;;1;;2-2-2, description, type;;;;3-3-3, filepath;;;;3-3-3, extensions, depth'),
        '3' => Array('showitem' => 'title;;1;;2-2-2, description, type;;;;3-3-3, externalUrl;;;;3-3-3, depth'),
    ),
    'palettes' => Array (
        '1' => Array('showitem' => 'starttime,hidden')
    )
);
?>