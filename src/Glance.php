<?php

namespace Glance;

class Glance {

    private $config;
    private $container;
    
    /**
     * 
     * @param Config $config
     */
    public function __construct($config = false) {

        if ($config and $config instanceof Config)
            $this->config = $config;

        else
            $this->config = new Config();
        
        $this->container = new Container($this->config);
        
        (new Bootstrap($this->container));
        
    }

    /**
     * Include all files .css
     * @param mixed $file name file css or array('file1','file2')
     * @return mixed
     */
    public function css($file = false) {
        
        $css = $this->enqueueFiles($file, $this->container->getCSS(), 'css');
        
        if(is_string($css))
            return $css;
        
        foreach($css as $value)
            print '<link rel="stylesheet" type="text/css" href="'.$value.'"'.PHP_EOL.PHP;
        
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

    /**
     * 
     * @param mixed $file name file or array of names of files
     * @param string $folder of files
     * @param mixed $extension of file or array with several extensions
     */
    public function enqueueFiles($file, $folder, $extension = null) {
 
        $enqueue = Check::file($file, $folder, $extension);

        return $enqueue;

    }

}
