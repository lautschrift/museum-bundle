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
      $db = \Contao\Database::getInstance();

      $result = $db->prepare('SELECT * FROM `tl_module` WHERE `id`= ?')
        ->execute($template->id);
      $myspeech = $result->museum_speech;

      $museums = $db->prepare('SELECT * FROM `tl_museum` WHERE `country` LIKE ? AND `published`=1 ORDER BY `region`  ')
        ->execute($myspeech);

      $locatedMusees = $museums->fetchAllAssoc();
      $regions = array();
      foreach ($museums as $museum) {
        $test .= $museum['region'];
        if (array_key_exists($museum['region'], $regions)) {
           // exists
        } else {
          $regions[$musem['region']] = $musem['region'];
        }

      }
      $template->museeums = $locatedMusees;
      $template->siteSpeech = $objPage->language;
      $template->regions = $regions;
      $template->test )= $test;
      return $template->getResponse();

  }
}
