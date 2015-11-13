<?php

namespace Glance;

class Glance
{
    
    private $config;
    
    /**
     * 
     * @param Config $config
     */
    public function __autoload($config=false)
    {
        
        if($config and $config instanceof Config)
        {
            $this->config = $config;
        }
        
    }
    
    /**
     * Include all files .css
     * @param mixed $file name file css or array('file1','file2')
     * @return mixed
     */
    public function css($file=false)
    {
        $this->enqueueFiles($file, __METHOD__, 'css');
    }
    
    /**
     * Include all files .js
     * @void
     */
    public function js()
    {
        
        
        
    }
    
    /**
     * Include files of images
     * @void
     */
    public function img()
    {
        
        
        
    }
    
    /**
     * 
     * @void
     */
    public function enqueue()
    {
        
        
        
    }

    /**
     * 
     * @param mixed $file name file or array of names of files
     * @param string $folder of files
     * @param mixed $extension of file or array with several extensions
     */
    public function enqueueFiles($file, $folder, $extension=null)
    {
        
        if($this->config === NULL)
        {            
            $this->config = new Config();
        }

        
        $check = new Check($this->config);
        
        $enqueue = Check::file($file, $check->folder($folder), $extension);

        if(!is_array($enqueue))
        {
            return $enqueue;
        }
        
        foreach($enqueue as $value)
        {
            print $value.PHP_EOL;
            
        }
        
        
        
        $parser = new Parser();
        
        echo '<pre>';
        print_r($parser->loadYAML('theme/config.yml'));
        
        
    }
    
}
