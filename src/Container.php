<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;
use Glance\Exception\RuntimeException as ErrorRuntime;

class Container implements ContainerInterface {

    private $activated;
    private $config;
    
    public function __construct(Config $config) {
        
        $this->config = $config;     
        $this->loadThemes($this->config->getFolderTheme());
        
    }
    
    public function getMainFolder(){
        
        return $this->config->getFolderTheme();
    }
    
    public function getMainConfig(){        
        return self::main_config;
    }
    
    public function getCSS(){
        return Filter::systemPath(
                    $this->getMainFolder()."/".$this->activated."/".$this->config->getFolderCSS() );
    }
    
    public function getIMG(){
        return Filter::systemPath(
                    $this->getMainFolder()."/".$this->activated."/".$this->config->getFolderIMG() );
    }
    
    public function getJS(){
        return  Filter::systemPath(
                    $this->getMainFolder()."/".$this->activated."/".$this->config->getFolderJS() );
    }

    public function getFolderAssets($folder=null){
        
        if( !$folder )
            return Filter::systemPath(
                    $this->getMainFolder()."/".$this->activated."/".self::folder_assets );
        
        $url_folder = $this->getMainFolder()."/".$this->activated."/".self::folder_assets."/".$folder;
        
        $parser = new Parser();
        
        if( !$parser->file()->exists($url_folder) ) {
            throw new ErrorRuntime("Library \"$folder\", in \"ASSETS\" not exists.");
        }
        
        return $url_folder;
       
    }
    
    public function getFileExample(){
        return Filter::systemPath(
                    $this->getMainFolder(). "/".$this->activated."/".self::file_example );
    }
    
    public function getScreenshot() {
        return Filter::systemPath(
                    $this->getMainFolder()."/".$this->activated."/".self::screenshot );
    }
    
    public function getThemeConfig() {
        return Filter::systemPath(
                    $this->getMainFolder()."/".$this->activated."/".self::theme_config );
    }
    
    public function getFolderTmpTheme() {
        
        return self::theme_folder_tmp;
        
    }
    
    public function loadThemes($folder) {
        
        $f_origin = $folder;
                
        $folder = Filter::realPath($folder);
        
        if( !$folder ) {
            throw new ErrorRuntime("Folder \"$f_origin\", not exists. It's important to save Themes.");
        }
        
        $parser = new Parser();
        $DS = DIRECTORY_SEPARATOR;
        
        if( !$parser->file()
                  ->exists( Filter::systemPath( $folder . "/" . $this->getMainConfig() )) ) {
            
            echo <<<DOC
            No found $folder{$DS}{$this->getMainConfig()}
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
        
        
        if( !$parser->file()
                  ->exists( Filter::systemPath( $this->getFolderTmpTheme() )) ) {
            
            echo <<<DOC
            <pre>
            Please, follow steps:
            
                1 - Create a folder in "public/theme"
                2 - Create a file in "public/theme/index.php", containing:
            
                    < ?php
                    require_once __DIR__.'/../../vendor/autoload.php';
                    use Glance\Response;
                    Response::listenMessage();
            
                3 - Create a file in "public/theme/.htaccess", containing:
            
                    
                    RewriteEngine On
                    RewriteCond %{REQUEST_FILENAME} !-f
                    RewriteCond %{REQUEST_FILENAME} !-d
                    RewriteRule ^(.*)$ index.php?get=$1 [L]
                    
            </pre>
DOC;
            exit;
        }
        
        $themes = $parser->loadYAML( Filter::systemPath( $folder . "/" . $this->getMainConfig() ) );
        $ftheme = NULL;
        
        foreach ($themes['themes'] as $theme => $value) {
            
            if(!$parser->file()->exists( Filter::systemPath( $folder . "/" . $theme)) ) {
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
        
        
        $parser = new Parser();
        
        foreach($folders as $val) {
            
            if(!$parser->file()->exists($val))
                $this->error ("Folder ".$val, $this->activated);
            
        }
        
        
        foreach($files as $val) {
            
            if(!$parser->file()->exists($val))
                    $this->error("File ".$val, $this->activated);
            
        }
        
    }

    
    private function error($value, $theme) {
        
        throw new ErrorRuntime("\"{$value}\" of theme: \"{$theme}\", not exists.");
        
    }
    
}
