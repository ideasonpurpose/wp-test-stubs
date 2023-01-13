<?php

/**
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function wp_enqueue_script($handle, $file, $deps = [], $version = false, $showInHead = false)
{
    global $enqueued;
    $enqueued[] = [
        'handle' => $handle,
        'file' => $file,
        'deps' => $deps,
        'version' => $version,
        'showInHead' => $showInHead,
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_register_script
 */
function wp_register_script($handle, $src, $deps, $ver, $in_footer)
{
    global $scripts;
    $scripts[] = ['handle' => $handle, 'src' => $src, 'ver' => $ver, 'in_footer' => $in_footer];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_register_style/
 */
function wp_register_style($handle, $src, $deps, $ver, $media = '')
{
    global $styles;
    $styles[] = [
        'handle' => $handle,
        'src' => $src,
        'deps' => $deps,
        'ver' => $ver,
        'media' => $media,
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_localize_script/
 */
function wp_localize_script($handle, $object_name, $l10n)
{
    global $localized;
    $localized = $localized ?? [];
    $localized[$handle] = [$object_name => $l10n];
}
