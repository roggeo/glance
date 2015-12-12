<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;
use Glance\Exception\RuntimeException as ErrorRuntime;

class Container implements ContainerInterface{

    private $activated;
    private $config;
    
    public function __construct(Config $config) {
        
        $this->config = $config;        
        $this->loadThemes($this->config->getFolder());
        
    }
    
    public function getMainFolder(){
        
        return $this->config->getFolder();
    }
    
    public function getMainConfig(){        
        return self::main_config;
    }
    
    public function getCSS(){
        return $this->getMainFolder().
                "/".$this->activated."/".$this->config->getFolderCSS();
    }
    
    public function getIMG(){
        return $this->getMainFolder().
                "/".$this->activated."/".$this->config->getFolderIMG();
    }
    
    public function getJS(){
        return $this->getMainFolder().
                "/".$this->activated."/".$this->config->getFolderJS();
    }

    public function getFileExample(){
       return $this->getMainFolder().
               "/".$this->activated."/".self::file_example;
    }
    
    public function getScreenshot() {
        return $this->getMainFolder().
                "/".$this->activated."/".self::screenshot;
    }
    
    public function getThemeConfig() {
        return $this->getMainFolder().
                "/".$this->activated."/".self::theme_config;
    }
    
    public function loadThemes($folder) {
        
        if(!is_dir($folder)) {
            throw new ErrorRuntime("Folder \"$folder\", not exists. It's important to save Themes.");
        }
        
        $parser = new Parser();
        
        if(!$parser->file()
                  ->exists($folder."/".$this->getMainConfig())) {
            
            echo <<<DOC
            No found $folder/{$this->getMainConfig()}
            Please, create one file of
            configuration to themes, something as config.yml:
            <pre>
            themes:
                "light": true
                "dark":
                "one-style":
            
DOC;
            exit;
        }
        
        $themes = $parser->loadYAML($folder."/".$this->getMainConfig());
        $ftheme = NULL;
        
        foreach ($themes['themes'] as $theme => $value) {
            
            if(!is_dir($folder."/".$theme)) {
                throw new ErrorRuntime("Folder of the THEME: \"$theme\", not exists.");
            }                 
            else {
                
                if(!$ftheme) {
                    $ftheme = $theme;
                }
                
                if($value and !$this->activated)
                    $this->activated = $theme;
            }
        }
        
        if($ftheme and !$this->activated) {
            $this->activated = $ftheme;
        }
        
    }
    
    
    public function getThemeActivated() {
        return $this->activated;        
    }
    
    public function setThemeActivated($theme) {
        $this->activated = $theme;
    }
    
    public function hasTreeTheme() {
        
        $folders = array(
                    $this->getCSS(),
                    $this->getJS(),
                    $this->getIMG(),
                );
        
        $files = array(
                    $this->getThemeConfig(),
                    $this->getFileExample(),
                    $this->getScreenshot(),
                );
        
        
        foreach($folders as $val) {
            
            if(!is_dir($val))
                $this->error ("Folder ".$val, $this->activated);
            
        }
        
        
        $parser = new Parser();
        foreach($files as $val) {
            
            if(!$parser->file()->exists($val))
                    $this->error("File ".$val, $this->activated);
            
        }
        
    }
    
    private function error($value, $theme) {
        
        throw new ErrorRuntime("\"{$value}\" of theme: \"{$theme}\", not exists.");
        
    }
    
}
