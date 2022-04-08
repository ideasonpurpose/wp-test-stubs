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

/**
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */
function register_post_type($post_type, $args = [])
{
    global $post_types;
    $post_types = $post_types ?? [];
    $post_types[] = $post_type;
}

/**
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
function register_taxonomy($taxonomy, $object_type, $args = [])
{
    global $taxonomies;
    $taxonomies = $taxonomies ?? [];
    $taxonomies[] = $taxonomy;
}

/**
 *
 */
function register_taxonomy_for_object_type($taxonomy, $object_type)
{
    global $register_taxonomy_for_object_type;
    $register_taxonomy_for_object_type = $register_taxonomy_for_object_type ?? [];
    $register_taxonomy_for_object_type[] = [$taxonomy, $object_type];
}

/**
 * @link https://developer.wordpress.org/reference/functions/register_activation_hook/
 */
function register_activation_hook($file, $callback)
{
    global $activation_hooks;
    $activation_hooks = $activation_hooks ?? [];
    $activation_hooks[] = ['hook' => 'activation', 'file' => $file, 'callback' => $callback];
}

/**
 * @link https://developer.wordpress.org/reference/functions/register_deactivation_hook/
 */
function register_deactivation_hook($file, $callback)
{
    global $activation_hooks;
    $activation_hooks = $activation_hooks ?? [];
    $activation_hooks[] = ['hook' => 'deactivation', 'file' => $file, 'callback' => $callback];
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
function add_rewrite_rule($regex, $query, $after = 'bottom')
{
    global $rewrite_rules;
    $rewrite_rules[] = ['regex' => $regex, 'query' => $query, 'after' => $after];
}

/**
 * Similar to all_added_{actions|filters}, this returns an array of rewrite_rules
 * organized by top/bottom.
 */
function all_rewrite_rules()
{
    global $rewrite_rules;
    $rules = $rewrite_rules ?? [];
    return array_reduce(
        $rules,
        function ($carry, $item) {
            $carry[$item['after']][] = [$item['regex'], $item['query']];
            return $carry;
        },
        ['top' => [], 'bottom' => []]
    );
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

/**
 * @link https://developer.wordpress.org/reference/functions/get_search_query/
 */
function get_search_query()
{
    global $search_query;
    return $search_query ?? '';
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
 * @link https://developer.wordpress.org/reference/functions/get_rest_url
 */
function get_rest_url($blog_id = null, $path = '/', $scheme = 'rest')
{
    global $rest_url;
    $rest_url ??= 'https://example.com/wp-json/'; // plain permalink version is  http://example.com/index.php?rest_route=
    return rtrim($rest_url, '/') . $path;
}

/**
 *
 * @link https://developer.wordpress.org/reference/functions/get_taxonomy/
 */
function get_taxonomy(string $taxonomy)
{
    global $taxonomies;
    return $taxonomies[$taxonomy] ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_terms/
 */
function get_terms(array|string $args = [], array|string $deprecated = '')
{
    global $get_terms;
    $get_terms = $get_terms ?? [new WP_Term(), new WP_Term()];
    return $get_terms;
}

/**
 * $scheme is ignored for now
 * TODO: Support $scheme
 * @link https://developer.wordpress.org/reference/functions/home_url/
 */
function home_url($path = '', $scheme = null)
{
    global $home_url;
    $home_url = $home_url ?? 'https://example.com';
    return rtrim($home_url, '/') . '/' . ltrim($path, '/');
    // return get_home_url(null, $path, $scheme);
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
 * @link https://developer.wordpress.org/reference/functions/wp_redirect/
 */
function wp_redirect($location, $status = 302, $x_redirect_by = 'WordPress')
{
    global $wp_redirect;
    $wp_redirect = $wp_redirect ?? [];
    $wp_redirect[] = [
        'location' => $location,
        'status' => $status,
        'x_redirect_by' => $x_redirect_by,
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_dropdown_categories/
 */
function wp_dropdown_categories($args)
{
    global $wp_dropdown_categories;
    $wp_dropdown_categories = $wp_dropdown_categories ?? [];
    $wp_dropdown_categories[] = $args;
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
 * @link https://developer.wordpress.org/reference/functions/update_user_meta/
 */
function update_user_meta()
{
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_add_inline_style/
 */
function wp_add_inline_style($handle, $data)
{
    global $inline_styles;

    $inline_styles = $inline_styles ?? [];
    $inline_styles[] = ['handle' => $handle, 'data' => $data];
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
 * @link  https://developer.wordpress.org/reference/functions/add_query_arg/
 */
function add_query_arg(...$args)
{
    $params = [];
    if (is_array($args[0])) {
        $params = $args[0];
        $uri = $args[1];
    } else {
        $params[$args[0]] = $args[1];
        $url = $args[2];
    }
    $url ??= 'https://example.com';

    $glue = strpos($url, '?') ? '&' : '?';
    foreach ($params as $key => $value) {
        $url .= "{$glue}{$key}={$value}";
    }
    return $url;
}

/**
 * TODO: Implement this in the calling namespace
 * @param mixed $err
 * @return void
 */
// function error_log($err){
//     global $error_log;
//     $error_log = $error_log ?? [];
//     $error_log[] = $err;
// }
