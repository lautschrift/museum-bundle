<?php

namespace Lautschrift\MuseumBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Contao\FilesModel;
use Contao\Controller;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement("tl_museum",
 *   category="Museum",
 *   template="ce_museum_element",
 * )
 */
class MuseumContentElement extends AbstractContentElementController
{
  protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
   {
       $template->text = $model->text;
       $template->museumContent = $model->info;
       $template->addImage = false;

       // Add an image
       if ($model->addImage && $model->singleSRC != '')
       {
           $template->addImage = true;
           $objModel = FilesModel::findByUuid($model->singleSRC);

           if ($objModel !== null && is_file(System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path))
           {
               $model->singleSRC = $objModel->path;
               Controller::addImageToTemplate($template, $model->row(), null, null, $objModel);
           }
       }

       return $template->getResponse();
   }
}
