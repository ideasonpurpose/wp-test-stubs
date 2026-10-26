<?php

function set_query_var($key, $value)
{
    global $query_var;
    $query_var = $query_var ?? [];
    $query_var[] = ['key' => $key, 'value' => $value, $key => $value];
}

function get_query_var($key)
{
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_search_query/
 */
function get_search_query()
{
    global $search_query;
    return $search_query ?? '';
}
