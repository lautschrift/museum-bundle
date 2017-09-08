<?php
/**
 * Table tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['museum'] = '
	{type_legend},type,headline;
	{museum_legend},museum_name, museum_street, museum_nr, museum_plz, museum_ort, museum_land, museum_email, museum_website, museum_geox, museum_geoy, museum_locstyle;
	{museumtext_legend},text;
	{image_legend},addImage;	
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
		'label' 	=> array('Ort', 'Ort'),
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
		'eval' 		=> array('tl_class' => 'w50 wizard'),
		'wizard' 	=> array('tl_content', 'pagePicker'),
		'inputType' => 'text',
		'sql'       => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_website] = array(
		'label' 	=> array('Website', 'Website Adresse'),
		'eval' 		=> array('tl_class' => 'w50 wizard'),
		'wizard' 	=> array('tl_content', 'pagePicker'),
		'inputType' => 'text',
		'sql'       => "varchar(255) NOT NULL default ''"
);
		
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_geox] = array(
		'label' =>array('Karte geoX', ''),
		
		'inputType'               => 'c4g_text',
		'eval'                    => array('mandatory'=>false, 'maxlength'=>20, 'tl_class'=>'w50 wizard' ),
		'save_callback'           => array(array('tl_calendar_events_c4g_maps','setLocLon')),
		'wizard'                  => array(array('GeoPicker', 'getPickerLink')),
		'sql'                     => "varchar(20) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_geoy] = array(
		'label' =>array('Karte geoY', ''),
			
		'inputType'               => 'c4g_text',
		'eval'                    => array('mandatory'=>false, 'maxlength'=>20, 'tl_class'=>'w50 wizard' ),
		'save_callback'           => array(array('tl_calendar_events_c4g_maps','setLocLat')),
		'wizard'                  => array(array('GeoPicker', 'getPickerLink')),
		'sql'                     => "varchar(20) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields'][museum_locstyle] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_calendar_events']['c4g_locstyle'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('tl_calendar_events_c4g_maps','getLocStyles'),
		'sql'                     => "int(10) unsigned NOT NULL default '0'"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['c4g_map_id'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['c4g_map_id'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('tl_content_c4g_maps', 'get_maps'),
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "int(10) unsigned NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['c4g_map_width'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['c4g_map_width'],
		'exclude'                 => true,
		'inputType'               => 'inputUnit',
		'options'                 => array('px', '%', 'em', 'vh', 'vw', 'vmin', 'vmax', 'pt', 'pc', 'in', 'cm', 'mm'),
		'eval'                    => array(
				'rgxp'=>'digit_auto_inherit',
				'tl_class'=>'w50',
				'includeBlankOption'=>true
		),
		'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['c4g_map_height'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['c4g_map_height'],
		'exclude'                 => true,
		'inputType'               => 'inputUnit',
		'options'                 => array('px', '%', 'em', 'vh', 'vw', 'vmin', 'vmax', 'pt', 'pc', 'in', 'cm', 'mm'),
		'eval'                    => array(
				'rgxp'=>'digit_auto_inherit',
				'tl_class'=>'w50',
				'includeBlankOption'=>true
		),
		'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['c4g_map_zoom'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['c4g_map_zoom'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>false, 'rgxp'=>'digit', 'tl_class'=>'clr'),
		'sql'                     => "int(10) unsigned NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['c4g_map_default_mapservice'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['c4g_map_default_mapservice'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('tl_content_c4g_maps', 'get_baselayers'),
		'sql'                     => "int(10) unsigned NOT NULL default '0'"

);
