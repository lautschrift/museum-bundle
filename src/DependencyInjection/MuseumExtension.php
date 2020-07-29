<?php
namespace Lautschrift\MuseumBundle\DependencyInjection;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
class MuseumExtension extends ConfigurableExtension
{
	protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
	{
		$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config')); 
		$loader->load(’services.yml’);
	} }