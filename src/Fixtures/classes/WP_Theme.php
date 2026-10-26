<?php

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
