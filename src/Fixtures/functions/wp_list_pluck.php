<?php

/**
 * @link https://developer.wordpress.org/reference/functions/wp_list_pluck/
 */
function wp_list_pluck(array $input_list, int|string $field, int|string $index_key = null): array
{
    global $wp_list_pluck;
    return is_array($wp_list_pluck) ? $wp_list_pluck : [];
}
