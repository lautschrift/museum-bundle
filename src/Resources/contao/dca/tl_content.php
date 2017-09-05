<?php
/**
 * Table tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['museum'] = '
	{type_legend},type,headline;
	{museum_legend},museumSet;
	{template_legend:hide},customTpl;
	{protected_legend:hide},protected;
	{expert_legend:hide},guests,cssID;
	{invisible_legend:hide},invisible,start,stop
';

$GLOBALS['TL_DCA']['tl_content'][museumSet] = array(

		'name' => array(
				'label' => array('Name', 'Name des Museums'),
				'eval' => array('tl_class' ),
				'inputType' => 'text',
		),

		'str' => array(
				'label' => array('Straße', 'Straße'),
				'eval' => array('tl_class' => 'w50'),
				'inputType' => 'text',
		),
		'nr' => array(
				'label' => array('Hausnumer', 'Hausnummer'),
				'eval' => array('tl_class' => 'w50'),
				'inputType' => 'text',
		),
		'plz' => array(
				'label' => array('Postleitzahl', 'Postleitzahl'),
				'eval' => array('tl_class' => 'w50'),
				'inputType' => 'text',
		),
		'ort' => array(
				'label' => array('Ort', 'Ort'),
				'eval' => array('tl_class' => 'w50'),
				'inputType' => 'text',
		),
		'land' => array(
				'label' => array('Land', ''),
				'eval' => array('tl_class' => 'clr'),
				'options' => array('Deutschland', 'Österreich', 'Schweiz', 'Italien', 'Slowenien'),
				'inputType' => 'select',
		),
		'email' => array(
				'label' => array('E-Mail', 'E-Mail Adresse'),
				'eval' => array('tl_class' => 'w50'),
				'inputType' => 'text',
		),
		'website' => array(
				'label' => array('Website', 'Website Adresse'),
				'eval' => array('tl_class' => 'w50'),
				'inputType' => 'url',
		),
		'description' => array(
				'label' => array('Infotext', 'Beschreibung und weiterführende Informationen zum Museum'),
				'inputType' => 'group',
		),
		'museuminfo' => array(
				'label' => array('Info-Text', 'Beschreibung und weiterführende Informationen zum Museum'),
				'eval' => array('rte' => 'tinyMCE'),
				'inputType' => 'textarea',
		)
	
);
