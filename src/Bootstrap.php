<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <geovanirog@gmail.com>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

class Bootstrap {
    
    public function __construct(Container $container) {
        
        $container->hasTreeTheme();
        
    }
    
}

