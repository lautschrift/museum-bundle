<?php

namespace Lautschrift\MuseumBundle\Controller\FrontEndModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\ServiceAnnotation\FrontendModule;
use Contao\ModuleModel;
use Contao\Template;
use Contao\Database;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @FrontendModule("museum_module",
 *   category="Museum",
 *   template="mod_museum",
 * )
 */
class MuseumModuleController extends AbstractFrontendModuleController
{
  protected function getResponse(Template $template, ModuleModel $model, Request $request): ?Response
  {
      global $objPage;
      $myID = \Contao\Input::get('id');
      $country = \Contao\Input::get('country');
      $db = \Contao\Database::getInstance();

      $result = $db->prepare('SELECT * FROM `tl_museum` ')
        ->execute();

      $musees = $result->fetchAllAssoc();
      $template->musees = $musees;
      $template->id = $id;
      return $template->getResponse();

  }
}
