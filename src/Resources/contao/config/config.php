<?php
/**
 * Back end modules
*/

/*
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'Museum' => array
	(
		'tables'	=> array('tl_museum'),

	)
));
*/
/**
 * Content elements
*/
/*
array_insert($GLOBALS['TL_CTE']['Museum'] ,1, array(
		'museum' => 'Lautschrift\\Museum-Bundle\\ContentMuseum'
));

*/

/*

$GLOBALS['TL_CTE']['Museum'] = array
(
	'museum' => 'MuseumBundle\Resources\ContentMuseum',

);


array_insert($GLOBALS['TL_CTE']['Museum'] ,1, array(
		'museum' => 'Lautschrift\\MuseumBundle\\Resources\\contao\\classes\\ContentMuseum'
));
*/


array_insert($GLOBALS['BE_MOD'], array_search('content', array_keys($GLOBALS['BE_MOD'])) + 1, array('Site' => array()));

array_insert($GLOBALS['BE_MOD']['Site'],2, array
(
        'palafittes_museum' => array
        (
            'tables' => array ('tl_museum', 'tl_museum_details', 'tl_content'),
        ),
));

$GLOBALS['TL_CTE']['Museum'] = array(
	'Museum' => 'Lautschrift\\MuseumBundle\\Resources\\contao\\classes\\ContentMuseum',
	//'Museum2' => 'Lautschrift\\MuseumBundle\\Resources\\contao\\classes\\ContentMuseumElement'
);


//$GLOBALS['FE_MOD']['Museum']['museum'] = 'Lautschrift\\MuseumBundle\\Resources\\contao\\modules\\ModuleMuseum';

//$GLOBALS['TL_CTE']['Museum']['Museum'] = '\\lautschrift\\museum-bundle\\src\\Resources\\contao\\classes\\ContentMuseum';
$GLOBALS['TL_LANG']['CTE']['Museum'] = array('Museum','Einbinden einer Museum-Karte über OpenLayers.');
//$GLOBALS['TL_LANG']['CTE']['Museum2'] = array('Museum (Element)','Einbinden eines Museum aus dem Palafittes Bereich');
