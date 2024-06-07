<?php

/**
 *
 * if the global $get_post is an array, each call will shift and return the first element
 * This allows for multiple calls with different values.
 *
 * @param int|WP_Post|null $post
 * @link https://developer.wordpress.org/reference/functions/get_post/
 */
function get_post($post = null, $output = 'OBJECT', $filter = 'raw')
{
    global $get_post;

    return (is_array($get_post)
        ? array_shift($get_post)
        : (is_object($post)
            ? $post
            : $get_post)) ?? false;
}
