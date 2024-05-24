<?php

/**
 * Stub a bunch of miscellaneous WordPress global functions
 */
function add_action($hook, $action, $priority = 10, $args = 1)
{
    global $actions;
    $actions[] = ['add' => $hook, 'action' => $action, 'priority' => $priority, 'args' => $args];
}

function remove_action($hook, $action, $priority = 10)
{
    global $actions;
    $actions[] = ['remove' => $hook, 'action' => $action, 'priority' => $priority];
}

function add_filter($hook, $filter, $priority = 10, $args = 1)
{
    global $filters;
    $filters[] = ['add' => $hook, 'action' => $filter, 'priority' => $priority, 'args' => $args];
}

function remove_filter($hook, $filter, $priority = 10)
{
    global $filters;
    $filters[] = ['remove' => $hook, 'action' => $filter, 'priority' => $priority];
}

/**
 *
 * @param mixed $hookType
 * @param String $addRemove Use this to toggle add or remove
 * @return array
 */
function _get_all($hookType, $addRemove)
{
    $hooks = [];
    if (!in_array($addRemove, ['add', 'remove'])) {
        throw new \Exception('Invalid addRemove value');
    }

    foreach ($hookType as $hook) {
        if (array_key_exists($addRemove, $hook)) {
            $action = '';
            if (is_string($hook['action'])) {
                $action = $hook['action'];
            } elseif (is_array($hook['action'])) {
                foreach ($hook['action'] as $a) {
                    $action .= is_string($a) ? $a : '';
                }
            } elseif (is_a($hook['action'], 'Closure')) {
                /**
                 * Execute anonymous functions (arrow functions)
                 */
                $action = $hook['action']();
            }
            $hooks[] = [$hook[$addRemove], $action];
        }
    }
    return $hooks;
}

function all_added_actions()
{
    global $actions;
    $actions = $actions ?? [];
    return _get_all($actions, 'add');
}
function all_removed_actions()
{
    global $actions;
    $actions = $actions ?? [];
    return _get_all($actions, 'remove');
}

function all_added_filters()
{
    global $filters;
    $filters = $filters ?? [];
    return _get_all($filters, 'add');
}

function all_removed_filters()
{
    global $filters;
    $filters = $filters ?? [];
    return _get_all($filters, 'remove');
}

function action_was_added($hook, $cmd = null)
{
    global $actions;
    foreach ($actions as $action) {
        if ($action['add'] == $hook) {
            if (!$cmd) {
                return true;
            } else {
                if ($action['action'] === $cmd || in_array($cmd, $action['action'])) {
                    return true;
                }
            }
        }
    }
    return false;
}

function action_was_removed($hook, $cmd = null)
{
    global $actions;
    foreach ($actions as $action) {
        if ($action['remove'] == $hook) {
            if (!$cmd) {
                return true;
            } else {
                if ($action['action'] === $cmd || in_array($cmd, $action['action'])) {
                    return true;
                }
            }
        }
    }
    return false;
}
