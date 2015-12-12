<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace GlanceTest;

use PHPUnit_Framework_TestCase;

class BootstrapTest extends PHPUnit_Framework_TestCase {
    
    
    public function testBootstrap() {
 
        $conf = new \Glance\Config();
        $conf->setFolder('fixture/theme');
        $theme = new \Glance\Glance($conf);

        $this->assertInternalType('string', $theme->css('main'));
        $this->assertInternalType('string', $theme->img('light.jpg'));
        $this->assertInternalType('string', $theme->js('light'));
        $this->assertInternalType('string', $theme->enqueue('img/light.jpg'));

    }
    
}