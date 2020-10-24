<?php

if (!defined('TL_ROOT')) die('You can not access this file directly!');

/***
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['tl_museum']        =   '{title_legend},name;'.
                                                                    '{test_legend},speech';
/***
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['speech'] = array (
  'speech' => [
      'label' => &$GLOBALS['TL_LANG']['tl_site']['speech'],
      'inputType' => 'select',
      'eval' 		=> array('submitOnChange' => true, 'tl_class' => 'clr', 'mandatory' => true),
      'options' 	=> ['DE', 'EN', 'FR', 'SLO', 'IT'],
      'reference' => &$GLOBALS['TL_LANG']['site_details_speech'],
      'sql' => ['type' => 'string', 'length' => 3, 'default' => 0]
  ],
);
