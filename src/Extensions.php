<?php

namespace Glance;

/**
 * Names extensions
 */
class Extensions implements ExtensionsInterface {

    
    /**
     * Check whether extensions are valid to themes
     * @param string $file
     * @retun bool
     */
    public function check($file) {
        
        $exp = explode('.', $file);
        
        if($this->ext('.'.end($exp))) {
            return true;
        }
        
        return false;
        
    }
    
    /**
     * 
     * @param string $file
     * @return bool
     */
    public function ext($file) {
        
        switch($file) {
            
            case self::JPG:
                return true;
            
            case self::PNG:
		 return true;
                
            case self::SVG:
		return true;
                
            case self::BMP:
		return true;
            case self::GIF:
		return true;
                
            case self::CSS:                
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
    
    
}
