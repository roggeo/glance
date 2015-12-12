<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace GlanceTest;

use PHPUnit_Framework_TestCase;

class FilterTest extends PHPUnit_Framework_TestCase {
    
    public function testExtensionsInterface() {
        
        $extensions = new ExtensionsTest();
        $this->assertTrue($extensions instanceof \Glance\ExtensionsInterface);
        
    }
    
    /**
     * @dataProvider nameExtensions
     */
    public function testExtensions($vl) { 
        $this->assertTrue($vl);
    }
    
    public function nameExtensions() {
        
        $extensions = new \Glance\Extensions();
        
        return array(
            array($extensions->ext('.jpg')),
            array($extensions->ext('.png')),
            array($extensions->ext('.gif')),
            array($extensions->ext('.html')),
            array($extensions->ext('.js')),
            array($extensions->ext('.css')),
            array($extensions->ext('.xml')),
            array($extensions->ext('.json')),
            array($extensions->ext('.yml'))
        );
        
    }
    
    
}