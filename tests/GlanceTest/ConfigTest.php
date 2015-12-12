<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace GlanceTest;

use PHPUnit_Framework_TestCase;

class ConfigTest extends PHPUnit_Framework_TestCase {

    public function testAttr() {
        
        $conf = get_class(new \Glance\Config());
        
        $this->assertClassHasAttribute('folder', $conf);
        $this->assertClassHasAttribute('folder_css', $conf);
        $this->assertClassHasAttribute('folder_img', $conf);
        $this->assertClassHasAttribute('folder_js', $conf);
        
    }
    
    public function testMainMethods() {

        $conf = new \Glance\Config();
        
        $this->assertNotEmpty($conf->getFolder());
        $this->assertNotEmpty($conf->getFolderCss());
        $this->assertNotEmpty($conf->getFolderIMG());
        $this->assertNotEmpty($conf->getFolderJS());
        
    }
    
    public function testContainerInterface() {
        
        $container = new ContainerTest();
        $this->assertTrue($container instanceof \Glance\ContainerInterface);
        
    }


}