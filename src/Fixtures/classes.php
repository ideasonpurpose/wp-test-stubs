<?php

/**
 * Class stubs
 */

class WP_Theme
{
    public $Name;

    public function __construct($Name = 'test-theme')
    {
        $this->Name = $Name;
    }

    public function get($key)
    {
        return $this->{$key};
    }

    /**
     * @link https://developer.wordpress.org/reference/classes/wp_theme/get_page_templates/
     * @return Array
     */
    public function get_page_templates($post = null, $post_type = 'page')
    {
        global $page_templates;
        return $page_templates ?? [
            'templates/page-template.php' => 'Page Template Title',
            'templates/page-template-2.php' => 'Page Template 2 Title',
        ];
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

class WP_User
{
    public $ID;
    public $user_login;
    public $display_name;
    public $user_email;

    public function __construct($ID = 1, $name = 'stella')
    {
        $this->ID = $ID;
        $this->user_login = $name;
        $this->display_name = 'Stella';
        $this->user_email = 'stella@example.com';
    }

    public function to_array()
    {
        return (array) $this;
    }

    public function exists()
    {
        global $wp_user_exists;
        return $wp_user_exists ?? false;
    }
}

/**
 * @link https://developer.wordpress.org/reference/classes/wp_term/
 */
class WP_Term
{
    public $term_id = 1;

    public function __construct($name = 'Dog', $slug = 'dog', $count = 4, $args = [])
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->count = $count;
        foreach ($args as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function to_array()
    {
        return (array) $this;
    }
}

/**
 * Mocked is_* functions will pass through and return the global value
 */
class WP_Query
{
    public function __call($name, $args)
    {
        return call_user_func_array($name, $args);
    }
}

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

/**
 * @link https://developer.wordpress.org/reference/classes/wp_error/
 */
class WP_Error
{
    public $code;
    public $message;
    public $data;
    public $is_debug;
    public function __construct($code = '', $message = '', $data = [])
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }
    /**
     * @link https://developer.wordpress.org/reference/classes/wp_screen/get_option/
     */
    public function get_error_message()
    {
        global $error_message;
        return $error_message ?? $this->message;
    }
}

/**
 * @link https://developer.wordpress.org/reference/functions/is_wp_error/
 */
function is_wp_error($err)
{
    return $err instanceof WP_Error;
}
