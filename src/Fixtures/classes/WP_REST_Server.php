<?php

/**
 * So far, we're only using this for the READABLE constant
 * @link https://developer.wordpress.org/reference/classes/wp_rest_server/
 */
class WP_REST_Server
{
    const READABLE = 'GET';
    const CREATABLE = 'POST';
    const EDITABLE = 'POST, PUT, PATCH';
    const DELETABLE = 'DELETE';
    const ALLMETHODS = 'GET, POST, PUT, PATCH, DELETE';
}
