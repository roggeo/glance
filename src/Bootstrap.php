<?php

namespace Glance;
use Glance\Exception\RuntimeException as ErrorRuntime;

class Bootstrap {
    
    public $themes;    
    
    public function __construct(Container $container) {
               
        $this->treeTheme($container->themeActivated());
        
    }
    
    /**
     * Files and folder required of one theme
     * 
     * @return array
     */
    public function treeTheme() {
        
                        
        
    }
    
    
}

