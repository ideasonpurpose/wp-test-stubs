<?php

/**
 * Option stubs.
 */

/**
 * This returns a matching value from the global $options array or null if no $options[$name] was not set
 * @param mixed $name
 * @return mixed
 */
function get_option($name)
{
    global $options;
    return $options[$name] ?? null;
}

/**
 * @link https://developer.wordpress.org/reference/functions/update_option/
 */
function update_option() {}
