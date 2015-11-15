<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <geovanirog@gmail.com>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

interface ExtensionsInterface {
    
    const JPG = ".jpg";
    const PNG = ".png";
    const SVG = ".svg";
    const BMP = ".bmp";
    const GIF = ".gif";
    
    const CSS = ".css";
    const HTML = ".html";
    const HTM = ".htm";
    const XML = ".xml";
    const JSON = ".json";
    const YML = ".yml";
    
    public function ext($file);
    
}

