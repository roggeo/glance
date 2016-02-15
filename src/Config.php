<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

class Config implements ContainerInterface{

    private $folder_css;
    private $folder_img;
    private $folder_js;
    private $theme_folder_tmp;

    public function __construct() {
        
        $this->setFolderTheme(self::main_folder);
        $this->setFolderCSS(self::folder_css);
        $this->setFolderIMG(self::folder_img);
        $this->setFolderJS(self::folder_js);
        $this->setFolderTmpTheme(self::theme_folder_tmp);
        
    }
    
    
    /**
     * Repository of the themes
     * @param string $folder
     */
    public function setFolderTheme($folder) {
    
        Tmpfile::setThemeConfig(array('themes_folder' => $folder));
        
    }

    /**
     * 
     * @return string
     */
    public function getFolderTheme() {
        
        return Tmpfile::getThemeConfig('themes_folder');
        
    }

    /**
     * Name folder of files css
     * @param string $folder
     */
    public function setFolderCSS($folder) {
        $this->folder_css = $folder;
    }

    /**
     * 
     * @return string
     */
    public function getFolderCSS() {
        return $this->folder_css;
    }

    /**
     * Name folder of files images
     * @param string $folder
     */
    public function setFolderIMG($folder) {
        $this->folder_img = $folder;
    }

    /**
     * 
     * @return string
     */
    public function getFolderIMG() {
        return $this->folder_img;
    }

    /**
     * Name folder of files javascript
     * @param string $folder
     */
    public function setFolderJS($folder) {
        $this->folder_js = $folder;
    }

    /**
     * 
     * @return string
     */
    public function getFolderJS() {
        return $this->folder_js;
    }
    
    /**
     * Name folder of link tmp
     * @param string $folder
     */
    public function setFolderTmpTheme($folder) {
        $this->theme_folder_tmp = $folder;
    }
        
    /**
     * 
     * @return string
     */
    public function getFolderTmpTheme() {
        return $this->theme_folder_tmp;
    }
    
}
