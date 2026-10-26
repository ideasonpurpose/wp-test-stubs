<?php

/**
 * Date and time stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/wp_timezone_string/
 */
function wp_timezone_string()
{
    global $wp_timezone_string;
    return $wp_timezone_string ?? 'America/New_York';
}

/**
 * @link https://developer.wordpress.org/reference/functions/human_time_diff/
 */
function human_time_diff($from, $to = 123)
{
    global $human_time_diff;
    return $human_time_diff ?? '2 hours';
}
