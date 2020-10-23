<?php

$GLOBALS['TL_DCA']['tl_museum_details'] = [
    'config' => [
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'ptable' => 'tl_museum',
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ],
        ],

      ],

      'list' => [
              'sorting' => [
                  'mode' => 4,
                  'fields' => ['speech'],
                  'headerFields' => ['name'],
                  'panelLayout' => 'search,limit',
                  'child_record_callback' => function (array $row) {
                      return '<div class="tl_content_left"><b>'.$row['speech'].'</b> ['.$row['number'].']</div>';
                  },
              ],
              'label' => [
                  'fields' => ['speech'],
                  'format' => '%s',
              ],
              'operations' => [
                  'edit' => [
                      'href' => 'act=edit',
                      'icon' => 'edit.svg',
                  ],
                  'copy' => [
                      'href' => 'act=paste&amp;mode=copy',
                      'icon' => 'copy.svg'
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
                      'button_callback'     => array('tl_museum_details', 'toggleIcon')
                  ),
                  'show' => [
                      'href' => 'act=show',
                      'icon' => 'show.svg'
                  ],
              ],
          ],

          'fields' => [
                'id' => [
                    'sql' => ['type' => 'integer', 'unsigned' => true, 'autoincrement' => true],
                ],
                'pid' => [
                    'foreignKey' => 'tl_museum.name',
                    'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
                    'relation' => ['type'=>'belongsTo', 'load'=>'lazy']
                ],
                'tstamp' => [
                    'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0]
                ],
                /*'type' => [
                    'label' => &$GLOBALS['TL_LANG']['tl_site']['type'],
                    'inputType' => 'select',
                    'eval' 		=> array('submitOnChange' => true, 'tl_class' => 'clr', 'mandatory' => true),
            		'options' 	=> ['wert0','wert1', 'wert2'],
            		'reference' => &$GLOBALS['TL_LANG']['site_details_type'],
                    'sql' => ['type' => 'string', 'length' => 20, 'default' => 0]
                ],*/
                'speech' => [
                    'label' => &$GLOBALS['TL_LANG']['tl_site']['speech'],
                    'inputType' => 'select',
                    'eval' 		=> array('submitOnChange' => true, 'tl_class' => 'clr', 'mandatory' => true),
                		'options' 	=> ['DE', 'EN', 'FR', 'SLO', 'IT'],
                		'reference' => &$GLOBALS['TL_LANG']['site_details_speech'],
                    'sql' => ['type' => 'string', 'length' => 3, 'default' => 0]
                ],
                'info' => [
        						'label' => &$GLOBALS['TL_LANG']['tl_museum']['info'],
        						'search' => true,
        						'eval' => array('rte' => 'tinyMCE'),
        						'inputType' => 'textarea',
        						'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
        				],
            ],

    ];

class tl_museum_details extends Backend
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
        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_site_details::published', 'alexf')) {
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
        if (!$this->User->isAdmin && !$this->User->hasAccess('tl_museum_details::published', 'alexf')) {

            //ToDo loggerService
            $this->log('Not enough permissions to publish/unpublish con4gis\MapsBundle\Resources\contao\classes\Utils ID "'.$intId.'"', 'tl_museum_details toggleVisibility', TL_ERROR);
            $this->redirect('contao/main.php?act=error');
        }
        $this->createInitialVersion('tl_museum_details', $intId);


        $objVersions = new Versions('tl_museum_details', $intId);
        $objVersions->initialize();

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_museum_details']['fields']['published']['save_callback'])) {
            foreach ($GLOBALS['TL_DCA']['tl_museum_details']['fields']['published']['save_callback'] as $callback) {
                $str_class = $callback[0];
                $str_function = $callback[1];

                if ($str_class && $str_function) {
                    $this->import($str_class);
                    $blnVisible = $this->$str_class->$str_function($blnVisible, $this);
                }
            }
        }

        // Update the database
        $this->Database->prepare("UPDATE tl_museum_details SET tstamp=". time() .", published='" . ($blnVisible ? 1 : 0) . "'  WHERE id=?")
                       ->execute($intId);
      /*
       $result = $this->Database->prepare("SELECT pid, CONCAT_WS(';',id,speech,published) AS detaillink FROM `tl_site_details` WHERE `id` = ?")
                   ->execute([$intId]);

       $link = $result->detaillink;
       $link_parts = explode(";",$link);
       $pid = $result->pid;
       $locatedLink = $link_parts[0].';'.$link_parts[1].';'.$link_parts[2];

       $getStoredIds = $this->Database->prepare('SELECT `details_link` FROM `tl_site` WHERE `id` = ?')
                           -> execute([$pid]);

       if($getStoredIds->details_link != '') {
           $allIds = json_decode($getStoredIds->details_link, true);

           foreach ($allIds as $key=>$val) {
              $tmp = explode(";",$val);
              $tmpId = $tmp[0];
              // Id exists
              if ($tmpId  == $intId || strpos($val ,"XXX")!==false) {
                  unset($allIds[$key]);
              }
          }
           //$actIds = json_encode($allIds);
       }


       if(!in_array($locatedLink, $allIds)) {
           $allIds[] = $locatedLink;
           $allIdsAsString = json_encode($allIds);
           $setChildToParent = $this->Database->prepare('UPDATE `tl_site` SET `details_link` = ? WHERE `id` = ?')
                                   ->execute([$allIdsAsString, $pid]);
       }
    */
        $this->createNewVersion('tl_museum_details', $intId);

    }

}
