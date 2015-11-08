<?php

namespace Glance;

use Symfony\Component\Yaml\Yaml;

class Parser {


    public function loadYAML($handler){
        
        return Yaml::parse(file_get_contents($handler));

    }

}
