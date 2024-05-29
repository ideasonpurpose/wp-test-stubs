<?php

/**
 * @link https://developer.wordpress.org/reference/functions/get_post/
 */
function get_post($post = null, $output = 'OBJECT', $filter = 'raw')
{
    global $get_post, $posts;

    if (is_object($post)) {
        return $post;
    } else {
        return $posts[$post] ?? $get_post;
    }
}
