<?php

if (!defined('TL_ROOT')) die('You can not access this file directly!');


/***
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['museum_speech'] = array (

      'label' => &$GLOBALS['TL_LANG']['tl_museum']['speech'],
      'inputType' => 'select',
      'eval' 		=> array('submitOnChange' => true, 'tl_class' => 'clr', 'mandatory' => true),
      'options' 	=> ['AT','DE', 'CH', 'FR', 'IT', 'SLO'],
      'reference' => &$GLOBALS['TL_LANG']['museum_details_speech'],
      'sql' => ['type' => 'string', 'length' => 3, 'default' => 0]

);

/***
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['default']        =   '{title_legend},name, type;'.
                                                                  '{museumspeech_legend},museum_speech';
