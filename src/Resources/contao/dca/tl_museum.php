<?php
/**
 * Table tl_museum
 */
$GLOBALS['TL_DCA']['tl_museum'] = array
(
	'dataContainer'               => 'Table',	
	'switchToEdit'                => true,
	'enableVersioning'            => true,
	'sql' => array
	(
		'keys' => array
		(
			'id' => 'primary',
			'alias' => 'index',
		)
	)
);

class tl_museum extends Backend
{
	
}