<?php

/**
 * NOTE: Updated 2023-07-25
 *
 * All three functions work the same way:
 * A global $transients array is appended with an array containing the function name and all arguments
 * Each function returns a named global matching its name, cast to a boolean value.
 *
 * For returning values from get_transient, store a value on the global $get_transient
 * variable using the the $transient name as the key.
 *
 * eg.
 *     global $get_transient;
 *     $get_transient['some-transient'] = "transient value";
 */

function transientHelper($function, $args, $return)
{
    global $transients;
    $transients = is_array($transients) ? $transients : [];
    $transients[] = array_merge([$function], $args);
    return $return;
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_transient
 */
function get_transient(string $transient): mixed
{
    global $get_transient;
    $get_transient = is_array($get_transient) ? $get_transient : [];
    $value = array_key_exists($transient, $get_transient) ?: false;
    return transientHelper('get', func_get_args(), $value);
}

/**
 * @link https://developer.wordpress.org/reference/functions/set_transient
 */
function set_transient(string $transient, mixed $value, int $expiration = 0): bool
{
    global $set_transient;
    return transientHelper('set', func_get_args(), (bool) $set_transient);
}

/**
 * @link https://developer.wordpress.org/reference/functions/delete_transient
 */
function delete_transient(string $transient): bool
{
    global $delete_transient;
    return transientHelper('delete', func_get_args(), (bool) $delete_transient);
}
