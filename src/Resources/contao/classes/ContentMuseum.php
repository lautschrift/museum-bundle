<?php
namespace Lautschrift\MuseumBundle\Resources\contao\classes; 

class ContentMuseum extends \ContentElement
{
	protected $strTemplate = 'ce_museum';

	protected function compile()
	{
		$rs = \Database::getInstance()
		->query('SELECT * FROM tl_content');

		$this->Template->Museum = $rs->fetchAllAssoc();
		//return;
	}
}