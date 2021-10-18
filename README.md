# wp-test-stubs

# WP Test Stubs

#### Version 0.0.0

A simple collection of stubs and doubles for testing WordPress code.

Unlike [Brain Monkey](https://brain-wp.github.io/BrainMonkey/) or [WP_Mock](https://github.com/10up/wp_mock), this is a very dumb library.

Most functions are just empty stubs.

## `add_action` and `add_filter`

The `add_action`, `remove_action`, `add_filter` and `remove_filter` functions record calls in global `$actions` or `$filters` arrays. Each call pushes an associative array onto the stack containing the `hook`, `action`, `priority` and `args`. Check those global arrays to check whether the action/filter was called correctly.

Any functions which need testing should be public and capable of being tested independently.

## is\_{$something} functions

All of these functions are mocked from the same pattern: Each will return the value of a global with the same name as the function. Since these functions are often used for control flow, being able to easily toggle their values makes it easy to test alternate pathways through System Under Test code without having to refactor.

To toggle any `is_` function, set a value like this:

```php
global $is_admin;
$is_admin = true;
```
