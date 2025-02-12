<?php

/**
 * @link https://developer.wordpress.org/reference/classes/wp_taxonomy/
 */
class WP_Taxonomy
{
    public $term_id = 1;
    public $name;
    public $label;
    public $query_var;
    public $hierarchical;
    public $labels;

    public function __construct(
        $name = 'animal',
        $label = 'Animals',
        $query_var = null,
        $hierarchical = true
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->query_var = $query_var ?? $name;
        $this->hierarchical = $hierarchical;
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
            'name' => ['Tags', 'Categories'],
            'singular_name' => ['Tag', 'Category'],
            'most_used' => ['Most Used', 'Most Used'],
        ];
    }
}
