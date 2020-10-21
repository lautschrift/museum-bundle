<?php
use \con4gis\MapsBundle\Classes\GeoPicker;
use con4gis\MapsBundle\Classes\Utils;
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
				'geoX' => [
            'label' => &$GLOBALS['TL_LANG']['tl_site']['geoX'],
            'eval'                    => array('mandatory'=>false, 'maxlength'=>20, 'tl_class'=>'w50 wizard' ),
            'inputType'               => 'c4g_text',
            'save_callback'           => [['tl_museum', 'setLocLon']],
            'wizard'                  => [['\con4gis\MapsBundle\Classes\GeoPicker', 'getPickerLink']],
            'sql' => ['type' => 'string', 'length' => 20, 'default' => '']
        ],
        'geoY' => [
            'label' => &$GLOBALS['TL_LANG']['tl_site']['geoY'],
            'eval'                    => array('mandatory'=>false, 'maxlength'=>20, 'tl_class'=>'w50 wizard' ),
            'inputType'               => 'c4g_text',
            'save_callback'           => [['tl_museum', 'setLocLat']],
            'wizard'                  => [['\con4gis\MapsBundle\Classes\GeoPicker', 'getPickerLink']],
            'sql' => ['type' => 'string', 'length' => 20, 'default' => '']
        ],
			],

			// Palettes
     'palettes' => [
         'default' => '{site_legend},name;{place_legend},city,country, geoX, geoY;'
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
	/**
	* Validate Longitude
	*/
	public function setLocLon($varValue, \DataContainer $dc)
	{
		if ($varValue != 0)
		{
			if (!Utils::validateLon($varValue))
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
			if (!Utils::validateLat($varValue))
			{
			throw new \Exception($GLOBALS['TL_LANG']['c4g_maps']['geoy_invalid']);
			}
		}
		return $varValue;
	}
}
