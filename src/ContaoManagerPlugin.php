<?php
declare(strict_types = 1);
namespace Lautschrift\MuseumBundle\ContaoManager;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class ContaoManagerPlugin implements BundlePluginInterface
{
	public function getBundles(ParserInterface $parser)
	{
		return [
				BundleConfig::create(MuseumBundle::class) 
				->setLoadAfter([ContaoCoreBundle::class])
				->setReplace(['museum'])
		]; }
}