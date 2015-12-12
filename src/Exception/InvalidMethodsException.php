<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance\Exception
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance\Exception;

class InvalidMethodsException {
    
    public function __construct($method, $find, $delimiter='::') {
        
        $expl = explode( $delimiter, $method);

        if(end($expl) !== $find){

            throw new InvalidArgumentException(sprintf("The method not was found, instead: \"%s\"", $method));
        }

    }
    
}