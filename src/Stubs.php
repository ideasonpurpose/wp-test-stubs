<?php

namespace IdeasOnPurpose\WP\Test;

/**
 * Wrapper class for importing our collected WordPress testing stubs and doubles
 * into the global namespace.
 */
class Stubs
{
    public static function init()
    {
        $dir = __DIR__ . '/Fixtures';
        $iterator = new \RecursiveDirectoryIterator($dir);
        foreach (new \RecursiveIteratorIterator($iterator) as $file) {
            if (strtolower($file->getExtension()) === 'php') {
                require_once $file;
            }
        }
    }
}
