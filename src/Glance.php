<?php

namespace Glance;

class Glance
{
    
    /**
     * 
     * @param Config $config
     */
    public function __autoload($config=false)
    {
        
        if($config and $config instanceof Config){
            ;
        }
        
    }
    
    /**
     * Include all files .js
     * @void
     */
    public function css() {
        
    }
    
    /**
     * Include all files .js
     * @void
     */
    public function js() {
        
        
        
    }
    
    /**
     * Include files of images
     * @void
     */
    public function img() {
        
        
        
    }
    
    /**
     * 
     * @void
     */
    public function enqueue() {
        
        
        
    }

}
