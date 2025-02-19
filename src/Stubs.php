<?php

namespace IdeasOnPurpose\WP\Test;

use stdClass;

/**
 * Wrapper class for importing our collected WordPress testing stubs and doubles
 * into the global namespace.
 */
class Stubs
{
    public static function init()
    {
        self::setupGlobals();

        $dir = __DIR__ . '/Fixtures';
        $iterator = new \RecursiveDirectoryIterator($dir);
        foreach (new \RecursiveIteratorIterator($iterator) as $file) {
            if (strtolower($file->getExtension()) === 'php') {
                require_once $file;
            }
        }
    }

    /**
     * Create placeholders for some WordPress global variables.
     */
    public static function setupGlobals()
    {
        global $wp, $wpdb;
        $wp = $wp ?? new stdClass();
        $wpdb = $wpdb ?? new stdClass();
    }

    /**
     * A utility proxy for PHP's native error_log().
     * Proxy this into the calling namespace with something like this:
     *
     *    namespace Test\Namespace;
     *    if (!function_exists(__NAMESPACE__ . '\error_log')) {
     *        function error_log($err)
     *        {
     *            Test\Stubs::error_log($err);
     *        }
     *    }
     */
    public static function error_log($err)
    {
        global $error_log;
        $error_log = "{$error_log}\n{$err}";
    }
}
