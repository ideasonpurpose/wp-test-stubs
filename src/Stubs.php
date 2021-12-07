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
        require_once 'Fixtures/classes.php';
        require_once 'Fixtures/is_.php';
        require_once 'Fixtures/stubs.php';
        require_once 'Fixtures/hooks.php';
        require_once 'Fixtures/acf.php';
    }
}
