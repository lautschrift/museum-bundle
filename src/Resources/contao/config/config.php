<?php

/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 1, array
(
	'Museum' => array
	(
		'tables'	=> array('tl_museum'),
		
	)
));

/**
 * Content elements
 */

$GLOBALS['TL_CTE']['Museum'] = array(
		'museum' => 'ContentMuseum'
);
