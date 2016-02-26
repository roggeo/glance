<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

/**
 * Names extensions
 */
class Extensions implements ExtensionsInterface {

    
    /**
     * Check whether extensions are valid to themes
     * @param string $file
     * @param bool $ret_ext If returns extension or not.
     * @retun bool|string
     */
    public function check($file, $ret_ext = false) {
        
        $exp = explode('.', $file);
        $ext = end($exp);
        
        if( $this->ext('.'.$ext) ) {
            return (!$ret_ext) ? true : $ext;
        }
        
        return false;
        
    }
    
    /**
     * 
     * @param string $name Name of extension
     * @return bool
     */
    public function ext($name) {
        
        switch($name) {
            
            case self::JPG:
                return true;
            
            case self::JPEG:
                return true;
                
            case self::PNG:
		 return true;
                
            case self::SVG:
		return true;
                
            case self::BMP:
		return true;
            case self::GIF:
		return true;
                
            case self::ICO:
		return true;
                
            case self::CSS:                
		return true;
             
            case self::JS:                
		return true;
                
            case self::HTML:
		return true;
                
            case self::HTM:
		return true;
                
            case self::XML:
		return true;
                
            case self::JSON:
		return true;
                
            case self::YML:
		return true;
                   
            default :
                return false;
        }        
        
    }
    
    /**
     * 
     * @param string $name Name of extension
     * @return string Name of Content-type
     */
    public function ctype($name) {
        
        
        switch($name) {
            
            case self::JPG:
                return "image/jpg";
            
            case self::JPEG:
                return "image/jpg";
                
            case self::PNG:
		return "image/png";
                
            case self::SVG:
		return "image/svg+xml";
                
            case self::BMP:
		return "image/bmp";
                
            case self::GIF:
		return "image/gif";
                
            case self::ICO:
		return "image/png";
                
            case self::CSS:                
		return "text/css";
             
            case self::JS:                
		return "application/javascript";
                
            case self::HTML:
		return "text/html";
                
            case self::HTM:
		return "text/html";
                
            case self::XML:
		return "application/xhtml+xml";
                
            case self::JSON:
		return "application/json";
                
            case self::YML:
		return "application/xhtml+xml";
                   
            default :
                return false;
        }
        
    }
    
    
}
