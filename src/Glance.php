<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 * 
 * @method mixed css(mixed $file = false, string $theme=null)
 * @method mixed js(mixed $file = false, string $theme=null)
 * @method mixed img(mixed $file, string $ext=null, string $theme=null)
 * @method mixed assets(mixed $file, string $lib=null, string $theme=null)
 * @method mixed enqueue(mixed $file, string $theme=null)
 * @method string getTheme() Name of theme actived
 * @method string themeRepository() Repository of themes
 * 
 */

namespace Glance;

class Glance {

    private $config;    
    private $theme;
    
    /**
     * 
     * @param Config $config
     */
    public function __construct($config = false) {

        
        if ($config and $config instanceof Config)
            $this->config = $config;

        else
            $this->config = new Config();

        $this->theme = new Theme( $this->config );

    }
    
    
    /**
     * @param string $method Method name to Glance\Theme
     * @param array  $args
     * @return mixed Result of function Glance\Theme
     */
    public function __call($method, $args) {
        
        
        $first = isset($args[0])? $args[0]: null;
        $two   = isset($args[1])? $args[1]: null;
        $three = isset($args[2])? $args[2]: null;
        
        $call = $this->theme->$method($first, $two, $three);
        
        return $this->buildPathTmp($call);

    }
    
    /**
     * 
     * @param type $url
     * @return type
     */
    public function buildPathTmp ($url) {
        
        
        if( is_string($url) ) {
            
            $url = $this->buildFolderTmp($url);
            
            return Filter::httpPathTmp($url);
            
        }
        
        if( is_array($url) ) { 
            
            foreach($url as $k => $v) {
                
                $v = $this->buildFolderTmp($v);
                
                $url[$k] = Filter::httpPathTmp($v);
                
            }
            
        }
        
        return $url;

    }
    
    /**
     * 
     */
    public function buildFolderTmp ( $path ) {
        
        
        $repository     = $this->theme->themeRepository();
        $repository_tmp = $this->theme->getFolderTmp();
        
        
        //if ( strpos( $path, $repository) === 0 )
        
        
        return str_replace($repository, $repository_tmp, $path);
                
    }

}
