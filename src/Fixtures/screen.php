<?php

/**
 * @link https://developer.wordpress.org/reference/functions/add_screen_option/
 */
function add_screen_option($option, $args = [])
{
    global $screen_option;

    if (!is_array($screen_option && !array_key_exists($option, $screen_option))) {
        $screen_option[$option] = [];
    }
    $screen_option[$option][] = $args;
    d($screen_option);
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_current_screen/
 */
function get_current_screen()
{
    global $current_screen;
    return $current_screen ?? new WP_Screen();
}
