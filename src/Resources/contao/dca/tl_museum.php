<?php

/**
 * Table tl_museum
 */
$GLOBALS['TL_DCA']['tl_museum'] = [
	// Config
	'config' => [

	'dataContainer'               => 'Table',
	//'ptable'                      => 'tl_content',
	'ctable'                      => ['tl_museum_details'],
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
							'href' => 'table=tl_museum_details',
							'icon' => 'edit.svg',
					],
					'editheader' => [
							'href' => 'act=edit',
							'icon' => 'header.svg',
					],
          'delete' => [
              'href' => 'act=delete',
              'icon' => 'delete.svg',
          ],
					'toggle' => array
					(
							'label'               => &$GLOBALS['TL_LANG']['tl_museum_details']['toggle'],
							'icon'                => '/system/themes/flexible/icons/visible.svg',
							'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
							'button_callback'     => array('tl_museum', 'toggleIcon')
					),
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
            'eval' => ['tl_class' => 'w100', 'maxlength' => 255, 'mandatory' => true],
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
					'eval' 		=> array('submitOnChange' => true, 'tl_class' => 'w50'),
					'options' 	=> array('DE','AT','CH','IT','SL','FR'),
					'reference' => &$GLOBALS['TL_LANG']['tl_museum'],
			    'inputType' => 'select',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'region' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['region'],
					'eval' 		=> ['tl_class' => 'w50', 'mandatory' => true],
	        'inputType' => 'text',
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
				'email' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['email'],
					'eval' 		=> array('tl_class' => 'w50'),
					'inputType' => 'text',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'website' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['website'],
					'eval' 		=> array('tl_class' => 'w50'),
					'inputType' => 'text',
					'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
				],
				'singleSRC' => [
            'label' => &$GLOBALS['TL_LANG']['tl_museum']['singleSRC'],
            'inputType' => 'fileTree',
            'eval' => [
                'tl_class' => 'clr',
                'mandatory' => false,
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => \Contao\Config::get('validImageTypes'),
            ],
            'sql' => ['type' => 'binary', 'length' => 16, 'notnull' => false, 'fixed' => true]
        ],
				'published' => [
						'label'                   => &$GLOBALS['TL_LANG']['tl_museum_details']['published'],
						'exclude'                 => true,
						'default'                 => true,
						'inputType'               => 'checkbox',
						'eval'                    => array('tl_class'=>'clr'),
						'sql'                     => "char(1) NOT NULL default '1'"
				],
			],

			// Palettes
     'palettes' => [
         'default' => '{museum_legend},name;{place_legend},street, street_nr, zip_code, place, region, country, museum_geox, museum_geoy;{contact_legend},email,website;{picture_legend},singleSRC;'
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
	     * Import BackendUser object
	     */
	    public function __construct()
	    {
	        parent::__construct();

	        $this->import('BackendUser', 'User');
	    }

	    /**
	     * Return the "toggle visibility" button
	     */
	    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	    {
	        if (strlen($this->Input->get('tid'))) {
	            $this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
	            $this->redirect($this->getReferer());
	        }

	        // Check permissions AFTER checking the tid, so hacking attempts are logged
	        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_site::published', 'alexf')) {
	            return '';
	        }

	        $href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

	        if (!$row['published']) {
	            $icon = '/system/themes/flexible/icons/invisible.svg';
	        }

	        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.\Image::getHtml($icon, $label).'</a> ';
	    }

	    /**
	     * Disable/enable an element
	     * @param integer
	     * @param boolean
	     */
	    public function toggleVisibility($intId, $blnVisible)
	    {
	        // Check permissions to publish
	        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_museum::published', 'alexf')) {

	            //ToDo loggerService
	            $this->log('Not enough permissions to publish/unpublish con4gis\MapsBundle\Resources\contao\classes\Utils ID "'.$intId.'"', 'tl_museum toggleVisibility', TL_ERROR);
	            $this->redirect('contao/main.php?act=error');
	        }
	        $this->createInitialVersion('tl_museum', $intId);


	        $objVersions = new Versions('tl_museum', $intId);
	        $objVersions->initialize();

	        // Trigger the save_callback
	        if (is_array($GLOBALS['TL_DCA']['tl_museum']['fields']['published']['save_callback'])) {
	            foreach ($GLOBALS['TL_DCA']['tl_museum']['fields']['published']['save_callback'] as $callback) {
	                $str_class = $callback[0];
	                $str_function = $callback[1];

	                if ($str_class && $str_function) {
	                    $this->import($str_class);
	                    $blnVisible = $this->$str_class->$str_function($blnVisible, $this);
	                }
	            }
	        }

	        // Update the database
	        $this->Database->prepare("UPDATE tl_museum SET tstamp=". time() .", published='" . ($blnVisible ? 1 : 0) . "'  WHERE id=?")
	                       ->execute($intId);

	        $this->createNewVersion('tl_museum', $intId);

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
