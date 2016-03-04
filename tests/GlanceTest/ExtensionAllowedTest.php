<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace GlanceTest;

use PHPUnit_Framework_TestCase;

class ExtensionAllowedTest extends PHPUnit_Framework_TestCase {
    
    
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
    
    
    /**
     * @dataProvider nameContentType
     */
    public function testContentTypes($vl) {
        
        $pattern = '/(image|application|text)\/[a-z+]*/';
        
        $this->assertRegExp($pattern, $vl);
        
    }
    
    
    public function nameExtensions() {
        
        $extensions = new \Glance\Extensions();
        
        return array(
            array($extensions->ext('.jpg')),
            array($extensions->ext('.jpeg')),
            array($extensions->ext('.png')),
            array($extensions->ext('.gif')),
            array($extensions->ext('.html')),
            array($extensions->ext('.js')),
            array($extensions->ext('.css')),
            array($extensions->ext('.xml')),
            array($extensions->ext('.json')),
            array($extensions->ext('.yml')),
            array($extensions->ext('.ico'))
        );
        
    }
    
    
    public function nameContentType() {
        
        $extensions = new \Glance\Extensions();
        
        return array(
            array($extensions->ctype('.jpg')),
            array($extensions->ctype('.jpeg')),
            array($extensions->ctype('.png')),
            array($extensions->ctype('.gif')),
            array($extensions->ctype('.html')),
            array($extensions->ctype('.js')),
            array($extensions->ctype('.css')),
            array($extensions->ctype('.xml')),
            array($extensions->ctype('.json')),
            array($extensions->ctype('.yml')),
            array($extensions->ctype('.ico'))
        );
        
    }
    
}