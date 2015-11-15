<?php

namespace Glance;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Filesystem\Filesystem;

class Parser {

    public function loadYAML($handler) {
        
        return Yaml::parse(file_get_contents($handler));
        
    }

    public function HTTP() {
        
        return ;
        
    }

    public function file() {

        return (new Filesystem());
        
    }

}
