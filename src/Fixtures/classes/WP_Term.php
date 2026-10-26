<?php

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
