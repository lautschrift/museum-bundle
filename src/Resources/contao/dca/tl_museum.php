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
				'cte_alias' => [
						'exclude'                 => true,
						'inputType'               => 'picker',
						'eval'                    => array('mandatory'=>true, 'tl_class'=>'clr'),
						'save_callback' => array
						(
							array('tl_museum', 'saveAlias'),
						),
						'options_callback' 				=> array('tl_museum', 'getAlias'),
						'sql'                     => "int(10) unsigned NOT NULL default 0",
						'relation'                => array('type'=>'hasOne', 'load'=>'lazy', 'table'=>'tl_museum')
				],
				'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_museum']['name'],
            'search' => true,
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w100', 'maxlength' => 255, 'mandatory' => true],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
        ],
				'info' => [
						'label' => &$GLOBALS['TL_LANG']['tl_museum']['info'],
						'search' => true,
						'eval' => array('rte' => 'tinyMCE'),
						'inputType' => 'textarea',
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
				'region' => [
					'label' => &$GLOBALS['TL_LANG']['tl_museum']['region'],
					'eval' 		=> array('tl_class' => 'w50'),
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
				'openings' => [
						'label' => &$GLOBALS['TL_LANG']['tl_museum']['openings'],
						'search' => true,
						'inputType' => 'textarea',
						'eval' => ['tl_class' => 'clr', 'rte' => 'tinyMCE', 'mandatory' => false],
						'sql' => ['type' => 'text', 'notnull' => false]
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
			],

			// Palettes
     'palettes' => [
         'default' => '{site_legend},name,info;{place_legend},street, street_nr, zip_code, place, country, museum_geox, museum_geoy;{contact_legend},email,website;{openings_legend},openings;{picture_legend},singleSRC;'
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
			 * Throw an exception if the current content element is selected (circular reference)
			 *
			 * @param mixed         $varValue
			 * @param DataContainer $dc
			 *
			 * @return mixed
			 */
			public function saveAlias($varValue, DataContainer $dc)
			{
				if ($dc->activeRecord && $dc->activeRecord->id == $varValue)
				{
					throw new \RuntimeException($GLOBALS['TL_LANG']['ERR']['circularPicker']);
				}

				return $varValue;
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

			 /**
				 * Get all content elements and return them as array (content element alias)
				 *
				 * @return array
				 */
				public function getAlias() {
						$parentIds = array();
						$alias = array();

						if (!$this->User->isAdmin) {
								foreach ($this->User->pagemounts as $id) {
										$parentIds[] = $id;
										$parentIds = array_merge($parentIds, $this->Database->getChildRecords($id, 'tl_museum'));
								}

								if (empty($parentIds)) {
										return $alias;
								}

								$contentElements = $this->Database->prepare("SELECT c.id, c.pid, c.type, (CASE c.type WHEN 'module' THEN m.name WHEN 'form' THEN f.title WHEN 'table' THEN c.summary ELSE c.headline END) AS headline, c.text, a.title FROM tl_content c LEFT JOIN tl_museum a ON a.id=c.pid LEFT JOIN tl_module m ON m.id=c.module LEFT JOIN tl_form f on f.id=c.form WHERE a.pid IN(". implode(',', array_map('intval', array_unique($parentIds))) .") AND (c.ptable='tl_***_***' OR c.ptable='') AND c.id!=? ORDER BY a.title, c.sorting")->execute(\Input::get('id'));
						} else {
								$contentElements = $this->Database->prepare("SELECT c.id, c.pid, c.type, (CASE c.type WHEN 'module' THEN m.name WHEN 'form' THEN f.title WHEN 'table' THEN c.summary ELSE c.headline END) AS headline, c.text, a.title FROM tl_content c LEFT JOIN tl_museum a ON a.id=c.pid LEFT JOIN tl_module m ON m.id=c.module LEFT JOIN tl_form f on f.id=c.form WHERE (c.ptable='tl_museum' OR c.ptable='') AND c.id!=? ORDER BY a.title, c.sorting")->execute(\Input::get('id'));
						}

						while ($contentElements->next()) {
										$headlineArray = deserialize($contentElements->headline, true);

										if (isset($headlineArray['value'])) {
												$headline = \StringUtil::substr($headlineArray['value'], 32);
										} else {
												$headline = \StringUtil::substr(preg_replace('/[\n\r\t]+/', ' ', $headlineArray[0]), 32);
										}

										$text = \StringUtil::substr(strip_tags(preg_replace('/[\n\r\t]+/', ' ', $contentElements->text)), 32);
										$strText = $GLOBALS['TL_LANG']['CTE'][$contentElements->type][0] . ' (';

										if ($headline != '') {
												$strText .= $headline . ', ';
										} elseif ($text != '') {
												$strText .= $text . ', ';
										}

										$key = $contentElements->title . ' (ID ' . $contentElements->pid . ')';
										$alias[$key][$contentElements->id] = $strText . 'ID ' . $contentElements->id . ')';
						}

						return $alias;
				}
}
