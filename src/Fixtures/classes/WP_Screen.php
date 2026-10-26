<?php

/**
 * See also the screen.php file for utility functions and globals
 * @link https://developer.wordpress.org/reference/classes/wp_screen/
 */
class WP_Screen
{
    /**
     * @link https://developer.wordpress.org/reference/classes/wp_screen/get_option/
     */
    public function get_option($option, $key = false)
    {
        global $screen_option;
        return $screen_option[$option] ?? null;
    }
}
