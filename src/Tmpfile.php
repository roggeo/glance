<?php

namespace Glance;

class Tmpfile {
    
    const FILE_INI = 'glance_theme_config.ini';
    
    /**
     * @param array $keys
     */
    final public static function setThemeConfig(Array $keys) {        
        
        $keys_config = array();
        
        foreach($keys as $k => $v) {
            
            $keys_config[] = "$k = $v".PHP_EOL;
            
        }        
        
        $tmp = Filter::systemPath( self::getTempDir() .DIRECTORY_SEPARATOR. self::FILE_INI );
        
        file_put_contents($tmp, implode('', $keys_config));
        
    }    
    
    /**
     * @param string $key (themes_folder)
     * @return array|string Description
     */
    final public static function getThemeConfig($key = null) {
        
        $ini_file = parse_ini_file( self::getTempDir() .DIRECTORY_SEPARATOR. self::FILE_INI );
        
        if(!$key)
            return $ini_file;        
        
        return $ini_file[$key];
        
    }
    
    /**
     * Origin of Michael Härtl <haertl.mike@gmail.com>
     * https://github.com/mikehaertl/php-tmpfile
     * 
     * @return string the path to the temp directory
     * 
     */
    public static function getTempDir()
    {
        if (function_exists('sys_get_temp_dir')) {
            return sys_get_temp_dir();
        } elseif ( ($tmp = getenv('TMP')) || ($tmp = getenv('TEMP')) || ($tmp = getenv('TMPDIR')) ) {
            return realpath($tmp);
        } else {
            return '/tmp';
        }
    }
    
}