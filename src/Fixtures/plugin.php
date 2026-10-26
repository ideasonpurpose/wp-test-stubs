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

/**
 * @link https://developer.wordpress.org/reference/functions/register_activation_hook/
 */
function register_activation_hook($file, $callback)
{
    global $activation_hooks;
    $activation_hooks = $activation_hooks ?? [];
    $activation_hooks[] = ['hook' => 'activation', 'file' => $file, 'callback' => $callback];
}

/**
 * @link https://developer.wordpress.org/reference/functions/register_deactivation_hook/
 */
function register_deactivation_hook($file, $callback)
{
    global $activation_hooks;
    $activation_hooks = $activation_hooks ?? [];
    $activation_hooks[] = ['hook' => 'deactivation', 'file' => $file, 'callback' => $callback];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_environment_type/
 */
function wp_get_environment_type()
{
    global $wp_get_environment_type;
    return $wp_get_environment_type ?? 'production';
}
