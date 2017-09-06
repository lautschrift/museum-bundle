<?php
/**
 * Table tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['museum'] = '
	{type_legend},type,headline;
	{museum_legend},museum_name, museum_street, museum_nr, museum_plz;
	{template_legend:hide},customTpl;
	{protected_legend:hide},protected;
	{expert_legend:hide},guests,cssID;
	{invisible_legend:hide},invisible,start,stop
';

/***
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_name] = array(
		'label' => array('Name', 'Name des Museums'),
		'eval' => array('tl_class' ),
		'inputType' => 'text',	
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_street] = array(
		'label' => array('Straße', 'Straße'),
        'eval' => array('tl_class' => 'w50'),
        'inputType' => 'text',
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_nr] = array(
		'label' => array('Hausnumer', 'Hausnummer'),
        'eval' => array('tl_class' => 'w50'),
        'inputType' => 'text',
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_plz] = array(
		  'label' => array('Postleitzahl', 'Postleitzahl'),
          'eval' => array('tl_class' => 'w50'),
          'inputType' => 'text',
);