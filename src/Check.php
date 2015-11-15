<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <geovanirog@gmail.com>
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
     * @param string $extension
     * @return string or array of files
     */
    public static function file($file, $folder, $extension=null) {

        if (!is_dir($folder)) {
            throw new Error("Directory \"$folder\" not found.");
        }
        
        $parser = new Parser();
        
        if(!$file) {
            
            $open_folder = glob("$folder/*");
            
            $exts = new Extensions();
            
            foreach($open_folder as $key => $val) {
                
                $exp = explode("/", $val);
                if(!$exts->check(end($exp)))
                   unset($open_folder[$key]);
                
            }
            
            return $open_folder;
            
        }
        
        
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

}
