<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

use Symfony\Component\HttpFoundation\Request as ResquestHttpFoundation,
    Symfony\Component\HttpFoundation\Response as ResponseHttpFoundation;

class Request {

    
    public static function fileContent($url) {
        
        $ext = new Extensions();
        $header_http = new ResponseHttpFoundation();
        
        $file = Tmpfile::getThemeConfig('themes_folder').DIRECTORY_SEPARATOR.$url;        
        $file = Filter::systemPath($file);        
        $path = Filter::realpath( $file );
        
        if(!$path) {
            
            $header_http->setContent( "<html><body><center><h1>Ops! file not exists :(</h1></center></body></html>" );
            $header_http->setStatusCode( ResponseHttpFoundation::HTTP_NOT_FOUND );
            $header_http->headers->set( 'Content-Type', "text/html" );
            $header_http->send();
            
            return false;
        }
        
        //Defined Content-type of file        
        $ctype = $ext->ctype( "." . $ext->check($path, true) );
   

        $header_http->setContent( file_get_contents($path) );
        $header_http->setStatusCode( ResponseHttpFoundation::HTTP_OK );
        $header_http->headers->set( 'Content-Type', $ctype );
        $header_http->send();
        
    }
    

}