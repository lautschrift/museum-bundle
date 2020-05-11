<?php
namespace Lautschrift\MuseumBundle\Resources\contao\classes;

class ContentMuseum extends \ContentElement
{
	protected $strTemplate = 'ce_museum';


	public function generate()
	    {
	        if (TL_MODE == 'BE') {
	            $template = new \BackendTemplate('be_wildcard');
	            $template->wildcard = '### '.utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['testelement'][0]).' ###';

	            return $template->parse();
	        }

	        return parent::generate();
	    }


	protected function compile()
	{
		$rs = \Database::getInstance()
		->query('SELECT * FROM tl_content');

		$this->Template->Museum = $rs->fetchAllAssoc();
		//return;
	}

}
