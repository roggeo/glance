<?php

namespace Glance;

class Tmpfile {
    
    
    /**
     * @param array $keys
     */
    final public static function setThemeConfig(Array $keys) {        
        
        $keys_config = array();
        
        foreach($keys as $k => $v) {
            
            $keys_config[] = "$k = $v".PHP_EOL;
            
        }        
        
        $tmp = Filter::systemPath( sys_get_temp_dir()."/glance_theme_config.ini" );
        
        file_put_contents($tmp, implode('', $keys_config));
        
    }    
    
    /**
     * @param string $key (themes_folder)
     * @return array|string Description
     */
    final public static function getThemeConfig($key = null) {
        
        $ini_file = parse_ini_file(sys_get_temp_dir().DIRECTORY_SEPARATOR."glance_theme_config.ini");
        
        if(!$key)
            return $ini_file;        
        
        return $ini_file[$key];
        
    }
    
}