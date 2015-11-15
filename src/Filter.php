<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <geovanirog@gmail.com>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;
use Glance\Exception\RuntimeException as ErrorRuntime;

class Filter {

    public static function file(&$file, $extension = false) {
        
        $exts = new Extensions();
        $obj = new static;
        
        if(is_string($file)) {
            
            $is_ext = $exts->check($file);
            
            if(!$is_ext and $extension)
                $file = "{$file}.{$extension}";
            
            $obj->hasError($file, $is_ext,$extension);

        }      
        elseif (is_array($file)) {
            
            foreach($file as $key => $val) {
                
                $is_ext = $exts->check($val);
                
                if(is_string($val) and !$is_ext and $extension)
                    $file[$key] = "{$val}.{$extension}";                    
                
                $obj->hasError("$val", $is_ext,$extension);
                
            }
        }
        else {
            throw new ErrorRuntime("Value for \$file is invalid.");
        }
        
    }
    
    protected function hasError($file, $is_ext, $ext) {
        
        if(!$is_ext and !$ext)
            throw new ErrorRuntime("File, \"$file\" has no extension valid to themes.");
        
        if(preg_match("/[\s\n\t\r\{\}\*]/", $file))
            throw new ErrorRuntime("File name, \"$file\" no can have special characters.");
        
    }

}