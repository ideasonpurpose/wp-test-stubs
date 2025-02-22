<?php

/**
 * All args are passed into the mock as params
 *
 * The only methods mocked here are get_params, get_param and has_param
 *
 * @link https://developer.wordpress.org/reference/classes/wp_rest_request/
 * @link https://github.com/WordPress/wordpress-develop/blob/trunk/src/wp-includes/rest-api/class-wp-rest-request.php
 */
class WP_REST_Request
{
    public $method;
    public $params;
    public $headers;
    public $body = null;
    public $route;
    public $attributes = [];
    public $parsed_json = false;
    public $parsed_body = false;


    public function __construct(array $params = []) { $this->params = $params; }
    public function add_header() {}
    public function canonicalize_header_name() {}
    public function from_url() {}
    public function get_attributes() {}
    public function get_body_params() {}
    public function get_body() {}
    public function get_content_type() {}
    public function get_default_params() {}
    public function get_file_params() {}
    public function get_header_as_array() {}
    public function get_header() {}
    public function get_headers() {}
    public function get_json_params() {}
    public function get_method() {}
    public function get_param($name) { return @$this->params[$name]; }
    public function get_parameter_order() {}
    public function get_params() { return $this->params; }
    public function get_query_params() {}
    public function get_route() {}
    public function get_url_params() {}
    public function has_param($name) { return array_key_exists($name, $this->params); }
    public function has_valid_params() {}
    public function is_json_content_type() {}
    public function offsetExists() {}
    public function offsetGet() {}
    public function offsetSet() {}
    public function offsetUnset() {}
    public function parse_body_params() {}
    public function parse_json_params() {}
    public function remove_header() {}
    public function sanitize_params() {}
    public function set_attributes() {}
    public function set_body_params() {}
    public function set_body() {}
    public function set_default_params() {}
    public function set_file_params() {}
    public function set_header() {}
    public function set_headers() {}
    public function set_method() {}
    public function set_param() {}
    public function set_query_params() {}
    public function set_route() {}
    public function set_url_params() {}
}
