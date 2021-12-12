<?php

if (!defined('JPEG_QUALITY')) {
    define('JPEG_QUALITY', 77);
}
/**
 * A bunch of placeholder WordPress functions in the global namespace
 */

function register_rest_field($type, $field, $args)
{
    global $rest_fields;
    $rest_fields[] = ['post_type' => $type, 'field' => $field];
    call_user_func($args['get_callback'], ['id' => 1]);
}

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

/**
 * @link https://developer.wordpress.org/reference/functions/add_rewrite_rule/
 */
function add_rewrite_rule()
{
}

function flush_rewrite_rules(bool $hard = true)
{
    global $flush_rewrite_rules;
    $flush_rewrite_rules = $hard;
}

/**
 * This returns a matching value from the global $options array or null if no $options[$name] was not set
 * @param mixed $name
 * @return mixed
 */
function get_option($name)
{
    global $options;
    return $options[$name] ?? null;
}
function post_type_supports($post_type, $feature)
{
    global $post_type_supports;
    return $post_type_supports ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
 */
function add_post_type_support($post_type, $feature, $args)
{
    global $post_type_support;
    $post_type_support = $post_type_support ?? [];
    $post_type_support[] = ['add' => $feature, 'post_type' => $post_type, $args => $args];
}

/**
 * @link https://developer.wordpress.org/reference/functions/remove_post_type_support/
 */
function remove_post_type_support($post_type, $feature)
{
    global $post_type_support;
    $post_type_support = $post_type_support ?? [];
    $post_type_support[] = ['remove' => $feature, 'post_type' => $post_type];
}

/**
 * Set `$post_meta` to control output in tests.
 *
 *
 * The WordPress function returns arrays or strings or arrays of arrays of strings.
 * Use the global $post_meta variable to
 *
 * @global $post_meta
 * @return mixed
 *
 * @link https://developer.wordpress.org/reference/functions/get_post_meta/
 */
function get_post_meta()
{
    global $post_meta;
    return $post_meta;
}

/**
 * Set `$post_types` to control output in tests.
 *
 * The WordPress function returns arrays or strings or arrays of arrays of strings.
 * Use the global $post_meta variable to
 *
 * TODO: This should also be able to return an array of WP_Post_Type objects
 *
 * @global $post_types
 * @return string[]
 * @link https://developer.wordpress.org/reference/functions/get_post_types/
 */
function get_post_types($args = [], $output = 'names', $operator = 'and')
{
    global $post_types;
    return (array) $post_types;
}

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
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
function add_meta_box(
    string $id,
    string $title,
    callable $callback,
    $screen = null,
    $context = 'advanced',
    $priority = 'default',
    $callback_args = null
) {
    global $meta_boxes;
    $meta_boxes = $meta_boxes ?? [];
    $meta_boxes[] = [
        'add' => $id,
        'id' => $id,
        'title' => $title,
        'callback' => $callback,
        'screen' => $screen,
        'context' => $context,
        'priority' => $priority,
        'callback_args' => $callback_args,
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/remove_meta_box/
 */
function remove_meta_box(string $id, $screen, $context)
{
    global $meta_boxes;
    $meta_boxes = $meta_boxes ?? [];
    $meta_boxes[] = [
        'remove' => $id,
        'id' => $id,
        'screen' => $screen,
        'context' => $context,
    ];
}

/**
 * Return the global $post_thumbnail_id if set, otherwise return the $id arg
 * @link https://developer.wordpress.org/reference/functions/get_post_thumbnail_id/
 */
function get_post_thumbnail_id($id)
{
    global $post_thumbnail_id;
    return $post_thumbnail_id ?? $id;
}

function sanitize_title($title)
{
    return $title;
}

function antispambot($email)
{
    return "antispambot_{$email}_antispambot";
}

/**
 * Records calls to `add_menu_page` in the global $menu_pages array.

 * @param string $page_title
 * @param string $menu_title
 * @param string $capability
 * @param string $menu_slug
 * @param callable|string $function
 * @param string $icon_url
 * @param int|null $position
 * @return void
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 */
function add_menu_page(
    $page_title,
    $menu_title,
    $capability,
    $menu_slug,
    $function = '',
    $icon_url = '',
    $position = null
) {
    global $menu_pages;
    $menu_pages = $menu_pages ?? [];
    $menu_pages[] = [
        'add' => $menu_slug,
        'page_title' => $page_title,
        'menu_title' => $menu_title,
        'capability' => $capability,
        'menu_slug' => $menu_slug,
        'function' => $function,
        'icon_url' => $icon_url,
        'position' => $position,
    ];
}
/**
 * Records calls to `remove_menu_page` in the global $menu_pages array.
 *
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 * @param mixed $menu_slug
 * @return void
 */
function remove_menu_page($menu_slug)
{
    global $menu_pages;
    $menu_pages = $menu_pages ?? [];
    $menu_pages[] = ['remove' => $menu_slug];
}

function wp_get_theme()
{
    global $wp_get_theme;
    return $wp_get_theme ?? new WP_Theme();
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
 */
function wp_get_attachment_image_src($attachment_id, $size = 'thumbnail', $icon = false)
{
    global $wp_get_attachment_image_src;
    return $wp_get_attachment_image_src ?? ['placeholder/image.jpg', 1024, 768, true];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_upload_dir/
 */
function wp_upload_dir()
{
    global $wp_upload_dir;
    return $wp_upload_dir ?? [
        'path' => '/Users/wp/fake/path',
        'url' => 'http://example.com/fake/path',
        'subdir' => '/fake',
        'basedir' => '/fake/path',
        'baseurl' => 'http://example.com/fake/path',
        'error' => '',
    ];
}

function wp_get_image_editor()
{
    global $wp_get_image_editor;
    return $wp_get_image_editor;
}

/**
 * @link https://developer.wordpress.org/reference/functions/update_attached_file/
 */
function update_attached_file()
{
}

/**
 * @link https://developer.wordpress.org/reference/functions/update_option/
 */
function update_option()
{
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_add_inline_style/
 */
function wp_add_inline_style()
{
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_current_user/
 */
function wp_get_current_user()
{
    global $wp_get_current_user;
    return $wp_get_current_user ?? new WP_User();
}

function error_log($err){
    global $error_log;
    $error_log = $error_log ?? [];
    $error_log[] = $err;
}
