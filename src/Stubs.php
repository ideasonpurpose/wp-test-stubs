<?php

namespace IdeasOnPurpose\WP\Test;

use stdClass;

/**
 * Wrapper class for importing our collected WordPress testing stubs and doubles
 * into the global namespace.
 *
 * init() loads every PHP file in src/Fixtures/classes, then every top-level PHP
 * file in src/Fixtures. Add a stub by putting it in the matching file. No edit
 * here is required unless a new class must load before another class.
 * WP_REST_Controller is loaded first because WP_REST_Posts_Controller extends it.
 */
class Stubs
{
    public static function init()
    {
        self::setupGlobals();

        $fixtures = __DIR__ . '/Fixtures';

        require_once "$fixtures/classes/WP_REST_Controller.php";
        self::requirePhpFiles("$fixtures/classes");
        self::requirePhpFiles($fixtures);
    }

    /**
     * Require every PHP file in $dir. Not recursive.
     * Sorted so the load order is deterministic. require_once skips files already loaded.
     */
    private static function requirePhpFiles(string $dir): void
    {
        $files = glob($dir . '/*.php') ?: [];
        sort($files, SORT_STRING);
        foreach ($files as $file) {
            require_once $file;
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
     *            IdeasOnPurpose\WP\Test\Stubs::error_log($err);
     *        }
     *    }
     */
    public static function error_log($err)
    {
        global $error_log;
        $error_log = "{(string) $error_log}\n{$err}";
    }
}
