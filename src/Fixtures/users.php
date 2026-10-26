<?php

/**
 * User and auth stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/get_user_meta/
 */
function get_user_meta($user_id, $key = '', $single = false)
{
    global $user_meta;
    return $user_meta ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/update_user_meta/
 */
function update_user_meta($user_id, $meta_key, $meta_value, $prev_value = '')
{
    global $user_meta;
    $user_meta = $user_meta ?? [];
    $user_meta = is_array($user_meta) ? $user_meta : [$user_meta];
    $user_meta[] = [
        'user_id' => $user_id,
        'meta_key' => $meta_key,
        'meta_value' => $meta_value,
        'prev_value' => $prev_value,
    ];
    $user_meta[$user_id] =
        array_key_exists($user_id, $user_meta) && is_array($user_meta[$user_id])
            ? $user_meta[$user_id]
            : [];
    $user_meta[$user_id][] = [
        'meta_key' => $meta_key,
        'meta_value' => $meta_value,
        'prev_value' => $prev_value,
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/delete_user_meta/
 */
function delete_user_meta($user_id, $meta_key, $meta_value = '')
{
    global $delete_user_meta;
    $delete_user_meta = ['user_id' => $user_id, 'meta_key' => $meta_key];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_current_user/
 */
function wp_get_current_user()
{
    global $wp_get_current_user;
    return $wp_get_current_user ?? new WP_User();
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_current_user_id/
 */
function get_current_user_id()
{
    return 1;
}

/**
 * @link https://developer.wordpress.org/reference/functions/current_user_can/
 */
function current_user_can($capability, ...$args)
{
    global $current_user_can;
    return !!$current_user_can;
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_create_nonce/
 */
function wp_create_nonce($action = -1)
{
    global $nonce;
    return $nonce ?? substr(sha1($action), 0, 12);
}
