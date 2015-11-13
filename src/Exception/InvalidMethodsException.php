<?php

namespace Glance\Exception;

class InvalidMethodsException {
    
    public function __construct($method, $find, $delimiter='::') {
        
        $expl = explode( $delimiter, $method);

        if(end($expl) !== $find){

            throw new InvalidArgumentException(sprintf("The method not was found, instead: \"%s\"", $method));
        }

    }
    
}