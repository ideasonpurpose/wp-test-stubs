<?php

/**
 * Taxonomy and term stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
function register_taxonomy($taxonomy, $object_type, $args = [])
{
    global $taxonomies;
    $taxonomies = $taxonomies ?? [];
    $taxonomies[] = $taxonomy;
}

/**
 *
 */
function register_taxonomy_for_object_type($taxonomy, $object_type)
{
    global $register_taxonomy_for_object_type;
    $register_taxonomy_for_object_type = $register_taxonomy_for_object_type ?? [];
    $register_taxonomy_for_object_type[] = [$taxonomy, $object_type];
}

/**
 *
 * @link https://developer.wordpress.org/reference/functions/get_taxonomy/
 */
function get_taxonomy(string $taxonomy)
{
    global $taxonomies;
    return $taxonomies[$taxonomy] ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_terms/
 */
function get_terms(array|string $args = [], array|string $deprecated = '')
{
    global $get_terms;
    $get_terms = $get_terms ?? [new WP_Term(), new WP_Term()];
    return $get_terms;
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_dropdown_categories/
 */
function wp_dropdown_categories($args)
{
    global $wp_dropdown_categories;
    $wp_dropdown_categories = $wp_dropdown_categories ?? [];
    $wp_dropdown_categories[] = $args;
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_object_taxonomies/
 */
function get_object_taxonomies($object_type, $output = 'names')
{
    global $object_taxonomies;
    return $object_taxonomies;
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_the_terms/
 */

function get_the_terms(int|WP_Post $post, string $taxonomy): array|false
{
    global $the_terms;
    return $the_terms ?? false;
}
