<?php

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
