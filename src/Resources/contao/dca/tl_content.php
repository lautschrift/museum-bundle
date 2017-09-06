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

$GLOBALS['TL_DCA']['tl_content']['fields'][museumSet] = array(

		'name' => array(
				'label' => array('Name', 'Name des Museums'),
				'eval' => array('tl_class' ),
				'inputType' => 'text',
		)
	
);