<?php

/**
 * Shortcode stubs.
 */

function shortcode_exists($code)
{
    global $shortcodes;
    $shortcodes = $shortcodes ?? [];
    return in_array($code, $shortcodes);
}

function add_shortcode($code, $function)
{
    global $shortcodes;
    $shortcodes = $shortcodes ?? [];
    $shortcodes[] = $code;
}
