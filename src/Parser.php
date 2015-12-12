<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Filesystem;

class Parser {

    public function loadYAML($handler) {
        
        return Yaml::parse(file_get_contents($handler));
        
    }

    public function file() {

        return (new Filesystem());
        
    }

}
