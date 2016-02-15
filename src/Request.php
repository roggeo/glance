<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

class Request {

    
    public static function fileContent($url) {
        
        $file = Tmpfile::getThemeConfig('themes_folder').DIRECTORY_SEPARATOR.$url;
        
        $file = Filter::systemPath($file);
        
        $path = Filter::realpath( $file );
        
        if(!$path)
            return false;

        //Defined type of file
        
        print file_get_contents( $path );
        
    }
    

}