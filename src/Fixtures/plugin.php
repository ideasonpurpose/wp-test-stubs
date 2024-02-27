<?php

/**
 * This file contains plugin related stubs
 */

/**
 * @link https://developer.wordpress.org/reference/functions/get_plugin_data/
 */
function get_plugin_data()
{
    global $plugin_data;
    return $plugin_data ?? [
        'Name' => 'Fake Plugin Data',
        'Version' => '1.22.333',
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/plugin_basename/
 */
function plugin_basename()
{
    global $plugin_basename;
    return $plugin_basename ?? 'mock-dir/plugin.php';
}
