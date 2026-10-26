<?php

/**
 * Post and post-type stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */
function register_post_type($post_type, $args = [])
{
    global $post_types;
    $post_types = $post_types ?? [];
    $post_types[] = $post_type;
}

function post_type_supports($post_type, $feature)
{
    global $post_type_supports;
    return $post_type_supports ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
 */
function add_post_type_support($post_type, $feature, $args)
{
    global $post_type_support;
    $post_type_support = $post_type_support ?? [];
    $post_type_support[] = ['add' => $feature, 'post_type' => $post_type, $args => $args];
}

/**
 * @link https://developer.wordpress.org/reference/functions/remove_post_type_support/
 */
function remove_post_type_support($post_type, $feature)
{
    global $post_type_support;
    $post_type_support = $post_type_support ?? [];
    $post_type_support[] = ['remove' => $feature, 'post_type' => $post_type];
}

/**
 * Set `$post_meta` to control output in tests.
 *
 *
 * The WordPress function returns arrays or strings or arrays of arrays of strings.
 * Use the global $post_meta variable to
 *
 * @global $post_meta
 * @return mixed
 *
 * @link https://developer.wordpress.org/reference/functions/get_post_meta/
 */
function get_post_meta()
{
    global $post_meta;
    return $post_meta;
}

/**
 * Set `$post_types` to control output in tests.
 *
 * The WordPress function returns arrays or strings or arrays of arrays of strings.
 * Use the global $post_meta variable to
 *
 * TODO: This should also be able to return an array of WP_Post_Type objects
 *
 * @global $post_types
 * @return string[]
 * @link https://developer.wordpress.org/reference/functions/get_post_types/
 */
function get_post_types($args = [], $output = 'names', $operator = 'and')
{
    global $post_types;
    return (array) $post_types;
}

function get_pages($args = [])
{
    global $pages;
    return $pages ?? [];
}

/**
 * Return the global $post_thumbnail_id if set, otherwise return the $id arg
 * @link https://developer.wordpress.org/reference/functions/get_post_thumbnail_id/
 */
function get_post_thumbnail_id($id)
{
    global $post_thumbnail_id;
    return $post_thumbnail_id ?? $id;
}

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

/**
 * @link https://developer.wordpress.org/reference/functions/get_post_type/
 */
function get_post_type($post = null): string|false
{
    global $post_type;
    return $post_type ?? ($post->post_type ?? false);
}
