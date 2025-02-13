# wp-test-stubs

# WP Test Stubs

#### Version 0.2.0

[![Packagist](https://badgen.net/packagist/v/ideasonpurpose/wp-test-stubs)](https://packagist.org/packages/ideasonpurpose/wp-test-stubs)
[![styled with prettier](https://img.shields.io/badge/styled_with-prettier-ff69b4.svg)](https://github.com/prettier/prettier)

A simple collection of stubs and doubles for testing WordPress code.

Unlike [Brain Monkey](https://brain-wp.github.io/BrainMonkey/) or [WP_Mock](https://github.com/10up/wp_mock), this is a very dumb library.

Most functions are just empty stubs or return a matching global variable.

## `add_action` and `add_filter`

The `add_action`, `remove_action`, `add_filter` and `remove_filter` functions record calls in global `$actions` or `$filters` arrays. Each call pushes an associative array onto the stack containing the `hook`, `action`, `priority` and `args`. Check those global arrays to see whether the action/filter was called correctly.

Any functions which need testing should be public and capable of being tested independently.

### `all_added_actions` and `all_added_filters` helper functions

These two helper functions return a simplified view of the global `$actions` and `$filters` arrays with each added hook represented as two-item, hook/action array: `['hook_name', 'method_name']`. The two parallel functions, `all_removed_actions` and `all_removed_filters` can be used with PHPUnit like this:

```php

$this->assertContains(['hook_name', 'method_name'], all_added_filters());
```

For short-arrow and anonymous functions (Closures), test for their returned values. For example, `fn() => 5` can be validated with `assertContains(['hook_name', 5]`.

## is\_{$something} functions

All of these functions are mocked from the same pattern: Each will return the value of a global with the same name as the function. Since these functions are often used for control flow, being able to easily toggle their values makes it simple to test alternate pathways through System Under Test code without having to refactor.

To toggle any `is_` function, set a value like this:

```php
global $is_admin;
$is_admin = true;
```

## i18n functions

Several [basic WordPress i18n functions](https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#basic-functions) are stubbed. These all work the same way. If `$i18n` global array is defined, the first string argument will be used as a key and any assigned value will be returned. If no key is defined, the original string is returned.

Example:

```php

$i18n = [
  'Bird' => 'pájaro',
  'Birds' => 'pájaros',
]

__('bird', 'ignored'); // pájaro
_x('Bird', 'ignored', 'also-ignored'); // pájaro
_n('Bird', 'Birds', 3, 'ignored'); // pájaros

```

Note that `_n()` will return through sprintf, templates should appear as keys the same as they would in a **\*.pot** file:

```php
$i18n = [
  '%s bird' => '%s pájaro',
  '%s birds' => '%s pájaros',
]
```

## Replacing error_log

A simple stub of PHP's built-in [`error_log`](https://www.php.net/manual/en/function.error-log.php) function is provided. Use namespaces to override the native function, add something like this to the top of your test files:

```php
Test\Stubs::init();

if (!function_exists(__NAMESPACE__ . '\error_log')) {
    function error_log($err)
    {
        Test\Stubs::error_log($err);
    }
}
```

Every call to error_log will append the logged content as a string to the global variable. To test calls to error_log, expose the global and test for strings like this:

```php
      public function testError_log()
    {
        global $error_log;
        log_and_error();  // logs "needle"
        $this->assertStringContainsString("needle", $error_log);
    }
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

<a href="https://www.ideasonpurpose.com"><img src="https://raw.githubusercontent.com/ideasonpurpose/ideasonpurpose/master/iop-logo-white-on-black-88px.png" height="44" align="top" alt="IOP Logo"></a><img src="https://raw.githubusercontent.com/ideasonpurpose/ideasonpurpose/master/spacer.png" align="middle" width="4" height="54"> This project is actively developed and used in production at <a href="https://www.ideasonpurpose.com">Ideas On Purpose</a>.

<!-- END IOP CREDIT BLURB -->
