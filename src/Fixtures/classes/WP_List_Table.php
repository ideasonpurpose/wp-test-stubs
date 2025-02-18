<?php

/**
 * Used to create admin tables
 * @link https://developer.wordpress.org/reference/classes/wp_list_table/
 */
class WP_List_Table
{
    public $items;
    public $test_var;

    public function prepare_items()
    {
    }
    public function get_columns()
    {
    }
    public function stop() {
        die('stopped');
    }
}
