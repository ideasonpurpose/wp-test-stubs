<?php

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
