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
    // return $name;
}

function update_option($opt, $val)
{
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

function sanitize_title($title)
{
    return $title;
}

function antispambot($email)
{
    return "antispambot_{$email}_antispambot";
}

function remove_meta_box()
{
}

function remove_menu_page()
{
}

function wp_get_theme()
{
    return new WP_Theme();
}

function wp_add_inline_style()
{
}

/**
 * Class stubs
 */

class WP_Theme
{
    public function __construct($Name = 'test-theme')
    {
        $this->Name = $Name;
    }

    public function get($key)
    {
        return $this->{$key};
    }
}

class WP_Admin_Bar
{
    public $nodes = [];
    /**
     *
     * @param array $node This should include an 'id' property
     * @return void
     */
    public function add_node($node)
    {
        $this->nodes[$node['id']] = (object) $node;
        // echo $node['title'];
    }
    public function get_node($key)
    {
        return (object) $this->nodes[$key] ?? false;
        //  ['id' => 'my-account', 'title' => 'Howdy, Stella'];
    }
}

class WP_Image_Editor
{
    public function generate_filename()
    {
        return 'file-optimized.jpg';
    }
    public function save()
    {
        return ['file' => 'file-optimized.jpg', 'path'];
    }
}
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
$is_ = ['is_admin_bar_showing', 'is_admin', 'is_embed', 'is_user_logged_in', 'wp_is_json_request'];
foreach ($is_ as $func) {
    eval("function {$func}() { global \${$func}; return !!\${$func}; }");
}

/**
 * ACF Pro
 */
function get_fields()
{
    return ['a', 'b', 'c'];
}

function wp_upload_dir()
{
    return [
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

function update_attached_file()
{
}
