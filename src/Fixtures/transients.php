<?php

/**
 * NOTE: Updated 2023-07-25
 *
 * All three functions work the same way:
 * A global $transients array is appended with an array containing the function name and all arguments
 * Each function returns a named global matching its name, cast to a boolean value.
 */

function transientHelper($function, $args, $return)
{
    global $transients;
    $transients = is_array($transients) ? $transients : [];
    $transients[] = array_merge([$function], $args);
    return (bool) $return;
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_transient
 */
function get_transient(string $transient): mixed
{
    global $get_transient;
    return transientHelper('get', func_get_args(), $get_transient);
}

/**
 * @link https://developer.wordpress.org/reference/functions/set_transient
 */
function set_transient(string $transient, mixed $value, int $expiration): bool
{
    global $set_transient;
    return transientHelper('set', func_get_args(), $set_transient);
}

/**
 * @link https://developer.wordpress.org/reference/functions/delete_transient
 */
function delete_transient(string $transient): bool
{
    global $delete_transient;
    return transientHelper('delete', func_get_args(), $delete_transient);
}
