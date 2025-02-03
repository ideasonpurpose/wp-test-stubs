<?php

/**
 * @link https://developer.wordpress.org/reference/functions/__/
 */
function __(string $text, string $domain = 'default'): string
{
    global $i18n;
    $i18n = $i18n ?? [];
    return $i18n[$text] ?? $text;
}

/**
 * @link https://developer.wordpress.org/reference/functions/_x/
 */
function _x(string $text, string $context, string $domain = 'default'): string
{
    return __($text);
}

/**
 * @link https://developer.wordpress.org/reference/functions/_n/
 */
function _n(string $single, string $plural, int $number, string $domain = 'default'): string
{
    $output = $number === 1 ? __($single) : __($plural);

    return sprintf($output, $number);
}
