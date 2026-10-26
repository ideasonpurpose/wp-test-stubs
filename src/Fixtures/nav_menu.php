<?php

/**
 * Nav menu stubs configured by globals.
 *
 * $nav_menu_locations: ['location' => menu_id]
 * $nav_menu_items:     [menu_id => [items]]
 * $nav_menu_current:   menu item ID to flag as current (stand-in for core context matching)
 */

/**
 * @link https://developer.wordpress.org/reference/functions/get_nav_menu_locations/
 */
function get_nav_menu_locations(): array
{
    global $nav_menu_locations;
    return $nav_menu_locations ?? [];
}

/**
 * @link https://developer.wordpress.org/reference/functions/wp_get_nav_menu_items/
 */
function wp_get_nav_menu_items(int|string|WP_Term $menu, array $args = []): array|false
{
    global $nav_menu_items;
    return $nav_menu_items[$menu] ?? false;
}

/**
 * Simplified: flags current, current_item_parent and current_item_ancestor by ID.
 *
 * @link https://developer.wordpress.org/reference/functions/_wp_menu_item_classes_by_context/
 */
function _wp_menu_item_classes_by_context(array &$menu_items): void
{
    global $nav_menu_current;
    $by_id = [];
    foreach ($menu_items as $item) {
        $item->current = (int) $item->ID === (int) $nav_menu_current;
        $item->current_item_parent = false;
        $item->current_item_ancestor = false;
        $by_id[(int) $item->ID] = $item;
    }
    $node = $by_id[(int) $nav_menu_current] ?? null;
    $first = true;
    while ($node && ($node = $by_id[(int) $node->menu_item_parent] ?? null)) {
        $node->current_item_ancestor = true;
        $node->current_item_parent = $first;
        $first = false;
    }
}
