<?php

/**
 * Theme and template directory stubs.
 */

/**
 * Set the $template_directory var for testing.
 *
 * The WordPress function returns a string containing the path to
 * the current theme's template directory. The Wordpress function
 * DOES NOT output a trailing slash
 *
 * This stub will strip trailing slashes from the global $template_directory
 *
 * @global string $template_directory
 * @return string Value of $template_directory or the current working directory
 * @link https://developer.wordpress.org/reference/functions/get_template_directory/
 */
function get_template_directory()
{
    global $template_directory;
    $template_dir = $template_directory ?? __DIR__;
    return rtrim($template_dir, '/');
}

/**
 * https://developer.wordpress.org/reference/functions/get_template_directory_uri/
 * @return void
 */
function get_template_directory_uri()
{
    global $template_directory_uri;
    $template_dir = $template_directory_uri ?? 'https://example.com/wp-content/themes/test';
    return rtrim($template_dir, '/');
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_theme_root/
 */
function get_theme_root()
{
    global $theme_root;
    $theme_root_dir = $theme_root ?? __DIR__;
    return rtrim($theme_root_dir, '/');
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_stylesheet/
 */
function get_stylesheet()
{
    global $stylesheet;
    return $stylesheet ?? 'theme-slug';
}

function wp_get_theme()
{
    global $wp_get_theme;
    return $wp_get_theme ?? new WP_Theme();
}
