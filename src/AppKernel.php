<?php
class AppKernel extends Kernel
{
	public function registerBundles() {
		$bundles = [ /* ... */
				new Contao\CoreBundle\ContaoCoreBundle(),
				new lautschrift\MuseumBundle\MuseumBundle()
				/* ... */
		];
		if (in_array($this->getEnvironment(), [’dev’, ’test’])) {
			$bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
			$bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(); 
			$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
		}
		return $bundles; }
		/* ... */
}