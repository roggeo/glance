<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace GlanceTest;

use PHPUnit_Framework_TestCase;

class CheckTest extends PHPUnit_Framework_TestCase {
    
    public function testMustMethods() {
        
        $parser = new \Glance\Parser();
        
        $yml_themes = $parser->loadYAML('fixture/theme/config.yml');        
        $this->assertArrayHasKey('themes',$yml_themes);
        
        $this->assertNotEmpty($parser->file());
        
    }

}

