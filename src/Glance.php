<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <geovanirog@gmail.com>
 * @license http://opensource.org/licenses/MIT
 */

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
            print '<link rel="stylesheet" type="text/css" href="'.$value.'"/>'.PHP_EOL;
        
    }

    /**
     * Include all files .js
     * @return mixed
     */
    public function js($file = false) {
        
        $js = $this->enqueueFiles($file, $this->container->getJS(), 'js');
        
        if(is_string($js))
            return $js;
        
        foreach($js as $value)
            print '<script type="text/javascript" src="'.$value.'"></script>'.PHP_EOL;
        
    }

    /**
     * Include files of images
     * @return mixed
     */
    public function img($file, $ext=null) {
        
        $img = $this->enqueueFiles($file, $this->container->getIMG(), $ext);
        return $img;
        
    }

    /**
     * 
     * @return mixed
     */
    public function enqueue($file) {
        
        $stack = $this->enqueueFiles($file,
                    $this->container->getMainFolder().'/'.
                    $this->container->themeActivated());
        
        return $stack;
        
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
