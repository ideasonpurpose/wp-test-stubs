<?php

/**
 * @link https://developer.wordpress.org/reference/functions/get_the_terms/
 */

function get_the_terms(int|WP_Post $post, string $taxonomy): array|false
{
    global $the_terms;
    return $the_terms ?? false;
}
