# wp-test-stubs

# WP Test Stubs

#### Version 0.1.0

[![Packagist](https://badgen.net/packagist/v/ideasonpurpose/wp-test-stubs)](https://packagist.org/packages/ideasonpurpose/wp-test-stubs)
[![styled with prettier](https://img.shields.io/badge/styled_with-prettier-ff69b4.svg)](https://github.com/prettier/prettier)

A simple collection of stubs and doubles for testing WordPress code.

Unlike [Brain Monkey](https://brain-wp.github.io/BrainMonkey/) or [WP_Mock](https://github.com/10up/wp_mock), this is a very dumb library.

Most functions are just empty stubs or return a matching global variable.

## `add_action` and `add_filter`

The `add_action`, `remove_action`, `add_filter` and `remove_filter` functions record calls in global `$actions` or `$filters` arrays. Each call pushes an associative array onto the stack containing the `hook`, `action`, `priority` and `args`. Check those global arrays to see whether the action/filter was called correctly.

Any functions which need testing should be public and capable of being tested independently.

### `all_added_actions` and `all_added_filters` helper functions

These two helper functions return a simplified view of the global `$actions` and `$filters` arrays with each added hook represented as two-item, hook/action array: `['hook_name', 'method_name']`. This can be used with PHPUnit like this:

```php

$this->assertContains(['hook_name', 'method_name'], all_added_filters());
```

Two parallel functions, `all_removed_actions` and `all_removed_filters` can be used the same way.

## is\_{$something} functions

All of these functions are mocked from the same pattern: Each will return the value of a global with the same name as the function. Since these functions are often used for control flow, being able to easily toggle their values makes it simple to test alternate pathways through System Under Test code without having to refactor.

To toggle any `is_` function, set a value like this:

```php
global $is_admin;
$is_admin = true;
```

## Local Development

To have Composer check out a live clone of this repo instead of downloading an archive from Packagist, add a repositories key to the root of your project's **composer.json** file:

```json
{
    "repositories": [
    {
      "type": "git",
      "url": "https://github.com/ideasonpurpose/wp-test-stubs"
    }
  ]
}
```

<!-- START IOP CREDIT BLURB -->

## &nbsp;

#### Brought to you by IOP

<a href="https://www.ideasonpurpose.com"><img src="https://raw.githubusercontent.com/ideasonpurpose/ideasonpurpose/master/IOP_monogram_circle_512x512_mint.png" height="44" align="top" alt="IOP Logo"></a><img src="https://raw.githubusercontent.com/ideasonpurpose/ideasonpurpose/master/spacer.png" align="middle" width="4" height="54"> This project is actively developed and used in production at <a href="https://www.ideasonpurpose.com">Ideas On Purpose</a>.

<!-- END IOP CREDIT BLURB -->
