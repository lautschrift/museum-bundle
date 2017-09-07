<?php
/**
 * Table tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['museum'] = '
	{type_legend},type,headline;
	{museum_legend},museum_name, museum_street, museum_nr, museum_plz, museum_ort, museum_land, museum_email, museum_website;
	{museumtext_legend},text;
	{source_legend},singleSRC,size,imagemargin,fullsize,overwriteMeta;	
	{template_legend:hide},customTpl;
	{protected_legend:hide},protected;
	{expert_legend:hide},guests,cssID;
	{invisible_legend:hide},invisible,start,stop
';

/***
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_name] = array(
		'label' 	=> array('Name', 'Name des Museums'),
		'eval' 		=> array('tl_class' ),
		'inputType' => 'text',	
		'sql'      	=> "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_street] = array(
		'label' 	=> array('Straße', 'Straße'),
        'eval' 		=> array('tl_class' => 'w50'),
        'inputType' => 'text',
		'sql'       => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_nr] = array(
		'label' 	=> array('Hausnumer', 'Hausnummer'),
        'eval' 		=> array('tl_class' => 'w50'),
        'inputType' => 'text',
		'sql'       => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_plz] = array(
		'label' 	=> array('Postleitzahl', 'Postleitzahl'),
        'eval' 		=> array('tl_class' => 'w50'),
        'inputType'	=> 'text',
		'sql'       => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_ort] = array(
		'label' 	=> array('Postleitzahl', 'Postleitzahl'),
		'eval' 		=> array('tl_class' => 'w50'),
		'inputType' => 'text',
		'sql'       => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_land] = array(
		'label' 	=> array('Land', ''),
        'eval' 		=> array('tl_class' => 'clr'),
		'options' 	=> array('Deutschland', 'Österreich', 'Schweiz', 'Italien', 'Slowenien'),
        'inputType' => 'select',
		'sql'       => "int(10) unsigned NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_email] = array(
		'label' 	=> array('E-Mail', 'E-Mail Adresse'),
		'eval' 		=> array('tl_class' => 'w50'),
		'inputType' => 'url',
		'sql'       => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_website] = array(
		'label' 	=> array('Website', 'Website Adresse'),
		'eval' 		=> array('tl_class' => 'w50'),
		'inputType' => 'url',
		'sql'       => "varchar(255) NOT NULL default ''"
);

