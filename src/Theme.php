<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

class Theme {
    
    
    private $container;
    private $origin;
    
    
    /**
     * 
     * @param Config $config
     */
     public function __construct(Config $config) {
       
        $this->container = new Container($config);
        
        (new Bootstrap($this->container));
        
    }
    
    
    /**
     * Include all files .css
     * @param mixed $file name file css or array('file1','file2')
     * @param string $theme Name some theme
     * @return mixed
     */
    public function css($file = false, $theme=null) {

        $this->secondaryTheme($theme);

        $css = $this->enqueueFiles($file, $this->container->getCSS(), 'css');
        
        if(is_string($css))
            return $css;
        
        foreach($css as $value)
            print '<link rel="stylesheet" type="text/css" href="'.$value.'"/>'.PHP_EOL;
        
    }

    
    /**
     * Include all files .js
     * @param mixed $file name file javascript or array('file1','file2')
     * @param string $theme Name some theme
     * @return mixed
     */
    public function js($file = false, $theme=null) {
        
        $this->secondaryTheme($theme);
        
        $js = $this->enqueueFiles($file, $this->container->getJS(), 'js');
        
        if(is_string($js))
            return $js;
        
        foreach($js as $value)
            print '<script type="text/javascript" src="'.$value.'"></script>'.PHP_EOL;
        
    }

    
    /**
     * Include files of images
     * @param mixed $file name file img or array('file1','file2')
     * @param string $ext Extension of image
     * @param string $theme Name some theme
     * @return mixed
     */
    public function img($file, $ext=null, $theme=null) {
        
        $this->secondaryTheme($theme);
        
        $img = $this->enqueueFiles($file, $this->container->getIMG(), $ext);
        
        return $img;
        
    }

    
    /**
     * Include files of folder assets
     * @param mixed $file
     * @param string $lib
     * @param string $theme
     * @return mixed
     */
    public function assets($file, $lib=null, $theme=null) {

        $this->secondaryTheme($theme);
        
        $assets = $this->enqueueFiles($file,
                    $this->container->getFolderAssets($lib)
                );
        
        return  $assets;

    }
    
    
    /**
     * Include any file
     * @param mixed $file Name file with extension or array('file1.css','file2.png')
     * @param string $theme Name some theme
     * @return mixed
     */
    public function enqueue($file, $theme=null) {
        
        $this->secondaryTheme($theme);
        
        $stack = $this->enqueueFiles(
                    $file, $this->container->getMainFolder()
                    . "/" . $this->container->getThemeActivated() );

        return $stack;
        
    }

    
    /**
     * @return string Theme activated
     */
    public function getTheme() {
        
        return $this->container->getThemeActivated();
        
    }
    
    
    /**
     * 
     * @return string
     */
    public function themeRepository() {
        
        return $this->container->getMainFolder();
        
    }
    
    /**
     * 
     * @return type
     */
    public function getFolderTmp() {
        
        return $this->container->getFolderTmp();
        
    }
    
    
    /**
     * 
     * @param mixed $file name file or array of names of files
     * @param string $folder of files
     * @param mixed $extension of file or array with several extensions
     * @return string|array
     */
    protected function enqueueFiles($file, $folder, $extension = null) {
        
        $this->destroySecondaryTheme();
        
        $enqueue = Check::file($file, $folder, $extension);

        return $enqueue;

    }
    
    
    /**
     * Configuration of theme secondary
     * @param string $theme Name of theme
     * @void
     */
    protected function secondaryTheme($theme=null) {
        
        if($theme) {
            $this->origin = $this->container->getThemeActivated();
            $this->container->setThemeActivated($theme);
        }
        
    }
    
    
    /**
     * Destroy theme secondary
     * @void
     */
    protected function destroySecondaryTheme() {
        
        if($this->origin)
            $this->container->setThemeActivated($this->origin);
        
        $this->origin = null;
        
    }
    
    
}