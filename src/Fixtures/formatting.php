<?php

/**
 * Escaping and sanitizing stubs.
 */

function sanitize_title($title)
{
    return $title;
}

/**
 * Fake it with htmlspecialchars
 * @link https://developer.wordpress.org/reference/functions/esc_attr
 */
function esc_attr($text)
{
    return htmlspecialchars($text ?? '');
}

/**
 * Return the global $esc_url if set, otherwise return the $url arg
 * @link https://developer.wordpress.org/reference/functions/esc_url/
 */
function esc_url($url, $protocols = null, $_context = 'display')
{
    global $esc_url;
    return $esc_url ?? $url;
}

/**
 * @link https://developer.wordpress.org/reference/functions/antispambot/
 */
function antispambot($email)
{
    return "antispambot_{$email}_antispambot";
}
