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
