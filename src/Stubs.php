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
        require_once 'Fixtures/stubs.php';
    }
}
