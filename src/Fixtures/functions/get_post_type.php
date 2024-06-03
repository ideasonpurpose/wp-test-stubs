<?php

/**
 * @link https://developer.wordpress.org/reference/functions/get_post_type/
 */
function get_post_type($post = null): string|false
{
    global $post_type;
    return $post_type ?? ($post->post_type ?? false);
}
