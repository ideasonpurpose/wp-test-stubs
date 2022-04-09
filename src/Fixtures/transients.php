<?php

/**
 * @link https://developer.wordpress.org/reference/functions/get_transient
 */
function get_transient($id)
{
    global $transients;
    if (array_key_exists($id, $transients)) {
        return $transients[$id];
    }
    return false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/set_transient
 */
function set_transient($data, $timeout)
{
    global $set_transient;
    $set_transient[] = ['data' => $data, 'timeout' => $timeout];
}
