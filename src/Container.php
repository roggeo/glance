<?php

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
        
        $parser = new Parser();
        
        if(!is_dir($folder)) {            
            $parser->file()->mkdir($folder, $mode = 0777);
        }
        
        if(!$parser->file()
                  ->exists($folder."/".$this->getMainConfig())) {
            
            echo <<<DOC
            No found $folder/{$this->getMainConfig()}
            <pre>
            Please, create one file of
            configuration to themes, something as config.yml:
            
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
                throw new ErrorRuntime("Folder of the THEME: \"$theme\", not exists");
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
    
    
    public function themeActivated() {
        return $this->activated;        
    }
    
    
}
