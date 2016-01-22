<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;
use Glance\Exception\InvalidArgumentException as Error;

class Check{

    private $config;

    public function __construct(Config $config) {

        $this->config = $config;
        
    }

    /**
     * 
     * @param mixed $file
     * @param string $folder
     * @param string $extension Opcional
     * @return string or array of files
     */
    public static function file($file, $folder, $extension=null) {

        if (!is_dir($folder))
            throw new Error("Directory \"$folder\" not found.");
        
        if (!$file && $folder)
            return self::fileAll($folder);
        
        $no_extension = false;
        
        if(!$extension)
            $no_extension = self::fileNoExtension($file, $folder);

        if( $no_extension )
            return $no_extension;
            
        $parser = new Parser();
        
        Filter::file($file, $extension);

        if (is_string($file)) {
            
            $namefill = "{$folder}/{$file}";
            
            if(!$parser->file()->exists($namefill)) {
                throw new Error("File \"$namefill\" not found.");
            }
            
            return $namefill;
            
        }
        
        if(!is_array($file))
            throw new Error("File invalid.");
        
        
        $i = 0;
        foreach($file as $val) {
            
            $namefill = "{$folder}/{$val}";
            
            if(!$parser->file()->exists($namefill))
                throw new Error("File \"$namefill\" not found.");
            
            $file[$i] = $namefill;
            
            $i++;
            
        }
        
        if($i == count($file))
            return $file;
        
    }
    
    /**
     * If no exists extension in file,
     * find file with the your extension
     * 
     * @param string $file
     * @param string $folder
     * @return bool|string With address url of the file
     */
    public static function fileNoExtension($file, $folder) {
        
        if( is_array($file) )
            return false;
        
        $exts = new Extensions();
        
        //case has extension
        if( strstr($file, '.') && $exts->check($file) )
            return false;
            
        $files = self::fileAll($folder);
        
        foreach($files as $v){
            
            $exp        = explode('/', $v);
            $file_sch   = explode('.',end($exp));
            $ky         = count($file_sch) -1;
            $file_ext   = $file_sch[$ky];
            
            unset($file_sch[$ky]);
            
            if(implode('.', $file_sch) == $file)
                return $folder.'/'.$file.'.'.$file_ext;
            
        }
        
        return false;
        
    }
    
    /**
     * 
     * @param string $folder
     * @return array Files of the folder defined on variable $folder
     */
    public static function fileAll($folder) {
        
        $open_folder = glob("$folder/*");
            
        $exts = new Extensions();

        foreach($open_folder as $key => $val) {

            $exp = explode("/", $val);
            if(!$exts->check(end($exp)))
               unset($open_folder[$key]);

        }
        
        return ($open_folder);
        
    }
    

}
