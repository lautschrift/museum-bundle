<?php

namespace Lautschrift\MuseumBundle\Resources\contao\modules;

class ModuleMuseum extends \Module
{
  /**
     * Template
     * @var string
     */
    protected $strTemplate = 'museum_module';

    public function generate()
    {
        if (TL_MODE == 'BE') {
            /*$objMap = $this->Database->prepare("SELECT * FROM tl_c4g_maps WHERE id=?")
                           ->limit(1)
                           ->execute($this->c4g_map_id);
            $return = '<h1>' . $objMap->name . '<img src="bundles/con4gismaps/images/be-icons/logo_con4gis-maps.svg" style="float:right"></h1>';
            */
            $return = '<h1>Museum Modul</h1>';
            return $return;
        }

        return parent::generate();
    }

    /**
     * Generate module
     */
    protected function compile()
    {
        //$this->Template->mapData = MapDataConfigurator::prepareMapData($this, $this->Database);
    }

}
