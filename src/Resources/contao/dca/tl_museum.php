<?php

/**
 * Table tl_museum
 */
$GLOBALS['TL_DCA']['tl_museum'] = [
	// Config
	'config' => [

	'dataContainer'               => 'Table',
	//'ptable'                      => 'tl_content',
	'ctable'                      => ['tl_content'],
	'enableVersioning'            => true,
	'markAsCopy'									=> 'name',
	'sql' => array
		(
		'keys' => array
			(
			'id' => 'primary'
			)
		)
	],
	//List
	'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['name'],
            'flag' => 1,
            'panelLayout' => 'search,limit'
        ],
        'label' => [
            'fields' => ['name'],
            'format' => '%s',
        ],
        'operations' => [
            'edit' => [
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ],

            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
            ],
            'show' => [
                'href' => 'act=show',
                'icon' => 'show.svg'
            ],
        ],
    ],
		// Fields
     'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'autoincrement' => true]
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0]
        ],
				'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_museum']['name'],
            'search' => true,
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50', 'maxlength' => 255, 'mandatory' => true],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
        ],
				'street' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['street'],
					'eval' 		=> array('tl_class' => 'w50'),
	        'inputType' => 'text',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'street_nr' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['street_nr'],
					'eval' 		=> array('tl_class' => 'w50'),
	        'inputType' => 'text',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'zip_code' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['zip_code'],
					'eval' 		=> array('tl_class' => 'w50'),
					'inputType' => 'text',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'place' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['place'],
					'eval' 		=> array('tl_class' => 'w50'),
					'inputType' => 'text',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'country' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['country'],
					'eval' 		=> array('submitOnChange' => true, 'tl_class' => 'clr'),
					'options' 	=> array('wert1','wert2','wert3','wert4','wert5','wert6'),
					'reference' => &$GLOBALS['TL_LANG']['tl_museum'],
			    'inputType' => 'select',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'museum_geox' => [
            'label' => &$GLOBALS['TL_LANG']['tl_museum']['museum_geox'],
            'eval'                    => array('mandatory'=>false, 'maxlength'=>20, 'tl_class'=>'w50 wizard' ),
            'inputType'               => 'c4g_text',
            'save_callback'           => [['tl_museum', 'setLocLon']],
            'wizard'                  => [['\con4gis\MapsBundle\Classes\GeoPicker', 'getPickerLink']],
            'sql' => ['type' => 'string', 'length' => 20, 'default' => '']
        ],
        'museum_geoy' => [
            'label' => &$GLOBALS['TL_LANG']['tl_museum']['museum_geoy'],
            'eval'                    => array('mandatory'=>false, 'maxlength'=>20, 'tl_class'=>'w50 wizard' ),
            'inputType'               => 'c4g_text',
            'save_callback'           => [['tl_museum', 'setLocLat']],
            'wizard'                  => [['\con4gis\MapsBundle\Classes\GeoPicker', 'getPickerLink']],
            'sql' => ['type' => 'string', 'length' => 20, 'default' => '']
        ],
			],

			// Palettes
     'palettes' => [
         'default' => '{site_legend},name;{place_legend},street, street_nr, zip_code, place, country, museum_geox, museum_geoy;'
    ]
];






/*array
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
*/
class tl_museum extends Backend
{

	public function __construct()
  	{
      $this->import('Contao\BackendUser', 'User');
      parent::__construct();
      $this->User->authenticate();
  	}

		/**
				* Validate Longitude
				*/
			 public function setLocLon($varValue, \DataContainer $dc)
			 {
					 if ($varValue != 0)
					 {
							 if (!\con4gis\MapsBundle\Classes\Utils::validateLon($varValue))
							 {
									 throw new \Exception($GLOBALS['TL_LANG']['c4g_maps']['geox_invalid']);
							 }
					 }
					 return $varValue;
			 }

			 /**
				* Validate Latitude
				*/
			 public function setLocLat($varValue, \DataContainer $dc)
			 {
					 if ($varValue != 0)
					 {
							 if (!\con4gis\MapsBundle\Classes\Utils::validateLat($varValue))
							 {
									 throw new \Exception($GLOBALS['TL_LANG']['c4g_maps']['geoy_invalid']);
							 }
					 }
					 return $varValue;
			 }
}
