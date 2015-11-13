<?php

namespace Glance;

class Check 
{
    
    private $config;
    
    public function __construct(Config $config)
    {
        
        $this->config = $config;
                
    }
    
    public function folder($name)
    {
        switch($name)
        {
            case "css":
                return $this->config->getFolderCSS();
                
            case "js":
                return $this->config->getFolderJS();

            case "img":
                return $this->config->getFolderJS();

            default :
                throw new Exception\InvalidArgumentException("Name folder not found");
        }
    
    }

    /**
     * 
     * @param mixed $file
     * @param string $folder
     * @param string $extension
     * @return string or array of files
     */
    public static function file($file, $folder, $extension) {

       
        
        Filter::file($file, $extension);
        
        
        $parser = new Parser();
        
        if (!is_dir($folder)) {
            throw new Exception\InvalidArgumentException("Directory $folder not found");
        }

        if (is_string($file) ) {
            
            
            
        }
            
            
            
    }

}
