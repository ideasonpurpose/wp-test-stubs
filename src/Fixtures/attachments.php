<?php

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
 * @param int $attachment_id
 * @param string|int *a446d68a
 * @param bool $icon
 * @return array|false
 */
function wp_get_attachment_image_src($attachment_id, $size = 'thumbnail', $icon = false)
{
    global $wp_get_attachment_image_src;
    return $wp_get_attachment_image_src ?? ['placeholder/image.jpg', 1024, 768, true];
}

/**
 * @link https://developer.wordpress.org/reference/functions/get_attached_file/
 * @param int $attachment_id
 * @param bool $unfiltered
 * @return string|false
 */
function get_attached_file(int $attachment_id, bool $unfiltered = false): string|false
{
    global $attached_file;
    return $attached_file ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_attachment_metadata/
 * @param int $attachment_id
 * @param bool $unfiltered
 * @return array|false
 */
function wp_get_attachment_metadata(int $attachment_id, bool $unfiltered = false): array|false
{
    global $attachment_metadata;
    return $attachment_metadata ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_original_image_path/
 * @param int $attachment_id
 * @param bool $unfiltered
 * @return string|false
 */
function wp_get_original_image_path(int $attachment_id, bool $unfiltered = false): string|false
{
    global $original_image_path;
    return $original_image_path ?? false;
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_upload_dir/
 */
function wp_upload_dir()
{
    global $wp_upload_dir;
    return $wp_upload_dir ?? [
        'path' => '/www/html/wp-content/uploads/2025/02',
        'url' => 'http://example.com/wp-content/uploads/2025/02',
        'subdir' => '/2025/02',
        'basedir' => '/www/html/wp-content/uploads',
        'baseurl' => 'http://example.com/wp-content/uploads',
        'error' => false,
    ];
}

function wp_get_image_editor()
{
    global $wp_get_image_editor;
    return $wp_get_image_editor;
}

/**
 * @link https://developer.wordpress.org/reference/functions/update_attached_file/
 */
function update_attached_file() {}
