<?php

namespace Glance;

class Config
{
    
    private $folder;
    
    private $folder_css = 'css';
    
    private $folder_img = 'js';
    
    private $folder_js = 'img';
    
    /**
     * Name folder of themes
     * @param string $folder
     */
    public function setFolder($folder)
    {        
        $this->folder =  $folder;
    }
    
    /**
     * 
     * @return string
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Name name folder of files css
     * @param string $folder
     */
    public function setFolderCSS($folder)
    {        
        $this->folder_css =  $folder;
    }
    
    /**
     * 
     * @return string
     */
    public function getFolderCSS()
    {
        return $this->folder_css;
    }
    
    /**
     * Name name folder of files images
     * @param string $folder
     */
    public function setFolderIMG($folder)
    {        
        $this->folder_img =  $folder;
    }
    
    /**
     * 
     * @return string
     */
    public function getFolderIMG()
    {
        return $this->folder_img;
    }
    
    /**
     * Name name folder of files javascript
     * @param string $folder
     */
    public function setFolderJS($folder)
    {        
        $this->folder_js =  $folder;        
    }
    
    /**
     * 
     * @return string
     */
    public function getFolderJS()
    {
        return $this->folder_js;
    }
    
}