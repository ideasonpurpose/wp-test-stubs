<?php

/**
 * Mocked is_* functions will pass through and return the global value
 *
 * @link https://developer.wordpress.org/reference/classes/wp_post_type/
 */
class WP_Post_Type
{
    public $name;
    public $label;
    public $labels;

    public function __construct($name = 'page', $label = 'Pages')
    {
        $this->name = $name;
        $this->label = $label;

        $this->labels = (object) [
            'name' => $name,
            'all_items' => 'All items',
            'no_terms' => 'No terms',
        ];
    }

    public static function get_default_labels()
    {
        global $default_labels;

        return $default_labels ?? [
            'name' => ['Posts', 'Pages'],
            'singular_name' => ['Post', 'Page'],
            'featured_image' => ['Featured image', 'Featured image'],
        ];
    }
}
