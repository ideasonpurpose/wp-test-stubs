<?php

/**
 * Posts to return are stored in a $posts global
 * $args passed to this function are stored in the $get_posts global,
 * so they can be inspected.
 *
 * @link https://developer.wordpress.org/reference/functions/get_posts/
 */
function get_posts(?array $args = null): array
{
    global $posts, $get_posts;
    $get_posts = $get_posts ?? [];
    $get_posts[] = $args;
    return $posts ?? [];
}
