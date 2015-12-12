<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

interface ExtensionsInterface {
    
    const JPG = ".jpg";
    const JPEG = ".jpeg";
    const PNG = ".png";
    const SVG = ".svg";
    const BMP = ".bmp";
    const GIF = ".gif";
    
    const CSS = ".css";
    const JS = ".js";
    const HTML = ".html";
    const HTM = ".htm";
    const XML = ".xml";
    const JSON = ".json";
    const YML = ".yml";
    
    public function ext($file);
    
}

