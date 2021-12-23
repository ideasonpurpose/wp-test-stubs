<?php

/**
 * All WordPress is_{$name} test functions are mocked using the same pattern:
 * They return the value of a global with the same name, allowing them
 * to be easily toggled in tests.
 *
 * To toggle any function, set a value like this:
 *    global $is_admin;
 *    $is_admin = true;
 *
 * To add additional functions, add their names to the $is_ array
 */
$is_ = [
    'is_admin_bar_showing',
    'is_admin',
    'is_archive',
    'is_embed',
    'is_front_page',
    'is_home',
    'is_main_query',
    'is_search',
    'is_single',
    'is_user_logged_in',
    'has_post_thumbnail',
    'wp_is_json_request',
];
foreach ($is_ as $func) {
    eval("function {$func}() { global \${$func}; return !!\${$func}; }");
}
