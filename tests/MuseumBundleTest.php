<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Lautschrift\MuseumBundle\Tests;

use Lautschrift\MuseumBundle\MuseumBundle;
use PHPUnit\Framework\TestCase;

class MuseumBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new MuseumBundle();

        $this->assertInstanceOf('Lautschrift\MuseumBundle\MuseumBundle', $bundle);
    }
}
