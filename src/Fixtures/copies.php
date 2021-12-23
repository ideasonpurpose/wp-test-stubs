<?php

/**
 * This file contains helper and utility functions copied directly
 * from the WordPress source code.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/trailingslashit/
 * @link https://github.com/WordPress/wordpress-develop/blob/5.8.1/src/wp-includes/formatting.php#L2703-L2705
 */
function trailingslashit($string)
{
    return untrailingslashit($string) . '/';
}

/**
 * @link https://developer.wordpress.org/reference/functions/untrailingslashit/
 * @link https://github.com/WordPress/wordpress-develop/blob/5.8.1/src/wp-includes/formatting.php#L2718-L2720
 */
function untrailingslashit($string)
{
    return rtrim($string, '/\\');
}
