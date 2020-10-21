<?php
namespace Lautschrift\MuseumBundle\Resources\contao\classes;

class ContentMuseumElement extends \ContentElement
{
	protected $strTemplate = 'ce_museum';


	public function generate()
	    {
	        if (TL_MODE == 'BE') {
	            $template = new \BackendTemplate('be_wildcard');
	            $template->wildcard = '### ~ MUSEUM ~'.utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['museum'][0]).' ###';

	            return $template->parse();
	        }

	        return parent::generate();
	    }


	protected function compile()
	{
		$rs = \Database::getInstance()
		->query('SELECT * FROM tl_museum');

		$this->Template->museumelement = $rs->fetchAllAssoc();

		//return;
	}

}
