<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

class Config implements ContainerInterface{

    private $folder;
    private $folder_css;
    private $folder_img;
    private $folder_js;

    public function __construct() {
        
        $this->folder       = self::main_folder;
        $this->folder_css   = self::folder_css;
        $this->folder_img   = self::folder_img;
        $this->folder_js    = self::folder_js;
        
    }
    
    
    /**
     * Name folder of themes
     * @param string $folder
     */
    public function setFolder($folder) {
        $this->folder = $folder;
    }

    /**
     * 
     * @return string
     */
    public function getFolder() {
        return $this->folder;
    }

    /**
     * Name name folder of files css
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
     * Name name folder of files images
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
     * Name name folder of files javascript
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

}
