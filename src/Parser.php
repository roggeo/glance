<?php

/**
 * @copyright (c) 2015, Glance
 * @package Glance
 * @author Geovani <https://github.com/roggeo>
 * @license http://opensource.org/licenses/MIT
 */

namespace Glance;

use Symfony\Component\Yaml\Yaml,
    Symfony\Component\Filesystem\Filesystem;

class Parser {

    public function loadYAML($handler) {
        
        return Yaml::parse(file_get_contents($handler));
        
    }
    

    /**
     * 
     * Methods of type Symfony\Component\Filesystem\Filesystem
     * 
     * @public copy(string $originFile, string $targetFile, bool $override = false)
     * @public mkdir(string|array|Traversable $dirs, int $mode = 511)
     * @public bool exists(string|array|Traversable $files)
     * @public touch(string|array|Traversable $files, int $time = null, int $atime = null)
     * @public remove(string|array|Traversable $files)
     * @public chmod(string|array|Traversable $files, int $mode, int $umask, bool $recursive = false)
     * @public chown(string|array|Traversable $files, string $user, bool $recursive = false)
     * @public chgrp(string|array|Traversable $files, string $group, bool $recursive = false)
     * @public rename(string $origin, string $target, bool $overwrite = false)
     * @public symlink(string $originDir, string $targetDir, bool $copyOnWindows = false)
     * @public string makePathRelative(string $endPath, string $startPath)
     * @public mirror(string $originDir, string $targetDir, Traversable $iterator = null, array $options = array())
     * @public bool isAbsolutePath(string $file)
     * @public string tempnam(string $dir, string $prefix)
     * @public dumpFile(string $filename, string $content)
     * 
     * @link http://api.symfony.com/3.0/Symfony/Component/Filesystem/Filesystem.html
     * 
     */
    public function file() {

        return (new Filesystem());
        
    }

}
