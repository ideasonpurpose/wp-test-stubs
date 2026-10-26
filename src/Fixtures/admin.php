<?php

/**
 * Admin menu and meta box stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
 */
function add_submenu_page(
    $parent_slug,
    $page_title,
    $menu_title,
    $capability,
    $menu_slug,
    $callback = '',
    $position = null,
) {
    global $submenu_page_id;
    return $submenu_page_id ?? 'submenu_page_' . $menu_slug;
}

/**
 * Records calls to `add_menu_page` in the global $menu_pages array.

 * @param string $page_title
 * @param string $menu_title
 * @param string $capability
 * @param string $menu_slug
 * @param callable|string $function
 * @param string $icon_url
 * @param int|null $position
 * @return void
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 */
function add_menu_page(
    $page_title,
    $menu_title,
    $capability,
    $menu_slug,
    $function = '',
    $icon_url = '',
    $position = null,
) {
    global $menu_pages;
    $menu_pages = $menu_pages ?? [];
    $menu_pages[] = [
        'add' => $menu_slug,
        'page_title' => $page_title,
        'menu_title' => $menu_title,
        'capability' => $capability,
        'menu_slug' => $menu_slug,
        'function' => $function,
        'icon_url' => $icon_url,
        'position' => $position,
    ];
}
/**
 * Records calls to `remove_menu_page` in the global $menu_pages array.
 *
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 * @param mixed $menu_slug
 * @return void
 */
function remove_menu_page($menu_slug)
{
    global $menu_pages;
    $menu_pages = $menu_pages ?? [];
    $menu_pages[] = ['remove' => $menu_slug];
}

/**
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
function add_meta_box(
    string $id,
    string $title,
    callable $callback,
    $screen = null,
    $context = 'advanced',
    $priority = 'default',
    $callback_args = null,
) {
    global $meta_boxes;
    $meta_boxes = $meta_boxes ?? [];
    $meta_boxes[] = [
        'add' => $id,
        'id' => $id,
        'title' => $title,
        'callback' => $callback,
        'screen' => $screen,
        'context' => $context,
        'priority' => $priority,
        'callback_args' => $callback_args,
    ];
}

/**
 * @link https://developer.wordpress.org/reference/functions/remove_meta_box/
 */
function remove_meta_box(string $id, $screen, $context)
{
    global $meta_boxes;
    $meta_boxes = $meta_boxes ?? [];
    $meta_boxes[] = [
        'remove' => $id,
        'id' => $id,
        'screen' => $screen,
        'context' => $context,
    ];
}
