<?php

/**
 * @link https://developer.wordpress.org/reference/functions/home_url/
 */
function home_url($path = '', $scheme = null)
{
    return get_home_url(null, $path, $scheme);
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_home_url/
 */
function get_home_url($blog_id = null, $path = '', $scheme = null)
{
    global $home_url;
    $home_url = $home_url ?? 'https://example.com';
    return rtrim($home_url, '/') . '/' . ltrim($path, '/');
    // return get_home_url(null, $path, $scheme);
}

/**
 * @link https://developer.wordpress.org/reference/functions/site_url/
 */
function site_url($path = '', $scheme = null)
{
    return get_site_url(null, $path, $scheme);
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_site_url/
 */
function get_site_url($blog_id = null, $path = '', $scheme = null)
{
    global $site_url;
    $site_url = $site_url ?? 'https://example.com';
    return rtrim($site_url, '/') . '/' . ltrim($path, '/');
}

/**
 * @link https://developer.wordpress.org/reference/functions/admin_url/
 */
function admin_url($path = '', $scheme = 'admin')
{
    return get_admin_url(null, $path, $scheme);
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_admin_url/
 */
function get_admin_url($blog_id = null, $path = '', $scheme = 'admin')
{
    global $site_url;
    $site_url = $site_url ?? 'https://example.com/wp-admin';
    return rtrim($site_url, '/') . '/' . ltrim($path, '/');
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_rest_url
 */
function get_rest_url($blog_id = null, $path = '/', $scheme = 'rest')
{
    global $rest_url;
    $rest_url ??= 'https://example.com/wp-json/'; // plain permalink version is  http://example.com/index.php?rest_route=
    return rtrim($rest_url, '/') . $path;
}
