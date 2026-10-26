<?php

/**
 * HTTP request and response stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/wp_redirect/
 */
function wp_redirect($location, $status = 302, $x_redirect_by = 'WordPress')
{
    global $wp_redirect;
    $wp_redirect = $wp_redirect ?? [];
    $wp_redirect[] = [
        'location' => $location,
        'status' => $status,
        'x_redirect_by' => $x_redirect_by,
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_remote_post/
 */
function wp_remote_post($url = '', $args = [])
{
    global $wp_remote_post;
    $default = [
        'body' => json_encode(['url' => $url, 'args' => $args]),
        'response' => ['code' => 200],
    ];
    return $wp_remote_post ?? $default;
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_send_json/
 */
function wp_send_json($response, $status_code = null, $options = 0)
{
    global $wp_send_json;
    $wp_send_json = ['response' => $response, 'status_code' => $status_code, 'options' => $options];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_die/
 */
function wp_die()
{
    throw new Exception('Throwing wp_die Exception');
}
