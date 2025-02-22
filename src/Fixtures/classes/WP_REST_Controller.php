<?php

/**
 * @link https://developer.wordpress.org/reference/classes/wp_rest_controller/
 */
abstract class WP_REST_Controller
{
    public $namespace;

    public function prepare_response_for_collection($response) {}

}
