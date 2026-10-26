<?php

/**
 * Mocked is_* functions will pass through and return the global value
 */
class WP_Query
{
    public function __call($name, $args)
    {
        return call_user_func_array($name, $args);
    }
}
