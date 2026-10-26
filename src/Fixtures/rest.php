<?php

/**
 * REST API stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/register_rest_route
 */
function register_rest_route($namespace, $route, $args = [], $override = false)
{
    global $register_rest_route;
    $register_rest_route = $register_rest_route ?? [];
    $register_rest_route[] = [$namespace, $route, $args, $override];
}

function register_rest_field($type, $field, $args)
{
    global $rest_fields;
    $rest_fields[] = ['post_type' => $type, 'field' => $field];
    call_user_func($args['get_callback'], ['id' => 1]);
}

/**
 * Just pass it through, we trust WordPress to handle this
 * @link https://developer.wordpress.org/reference/functions/rest_ensure_response/
 */
function rest_ensure_response($response)
{
    return $response;
}
