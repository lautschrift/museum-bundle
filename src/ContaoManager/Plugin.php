<?php
declare(strict_types = 1);
namespace Lautschrift\MuseumBundle\ContaoManager;

use Lautschrift\MuseumBundle\MuseumBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
	public function getBundles(ParserInterface $parser)
	{
		return [
				BundleConfig::create(MuseumBundle::class) 
				->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle', 'Contao\ManagerBundle\ContaoManagerBundle'])
				->setReplace(['museum'])
		]; }
}