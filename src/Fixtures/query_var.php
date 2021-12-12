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
