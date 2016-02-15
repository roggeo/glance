<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;


class Response {

    
    public static function listenMessage() {

        $url = ( isset($_GET['get']) && is_string($_GET['get']) )? $_GET['get']: false;

        Request::fileContent($url);

    }
    
}