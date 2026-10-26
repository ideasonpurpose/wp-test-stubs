<?php

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
