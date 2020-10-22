<?php
namespace Lautschrift\MuseumBundle\Resources\contao\classes;

class ContentMuseumElement extends \ContentElement
{
	protected $strTemplate = 'ce_museum';


	public function generate()
	    {
	        if (TL_MODE == 'BE') {
	            $template = new \BackendTemplate('be_wildcard');
	            $template->wildcard = '### ~ MUSEUM ~'.utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['tl_museum'][0]).' ###';

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
