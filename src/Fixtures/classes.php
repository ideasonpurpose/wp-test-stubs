<?php

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

class WP_User
{
    public $ID = 1;
    public $display_name = 'Stella';
    public $user_email = 'stella@example.com';
    public $user_login = 'stella';

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
 * @link https://developer.wordpress.org/reference/classes/wp_taxonomy/
 */
class WP_Taxonomy
{
    public $term_id = 1;
    public $label = 'Taxonomy label';
    public $name = 'taxonomy-name';

    public function __construct()
    {
        $this->labels = (object) ['all_items' => 'All items', 'no_terms' => 'No terms'];
    }
}

/**
 * @link https://developer.wordpress.org/reference/classes/wp_term/
 */
class WP_Term
{
    public $term_id = 1;

    public function __construct($name = 'Dog', $slug = 'dog', $count = 4)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->count = $count;
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
