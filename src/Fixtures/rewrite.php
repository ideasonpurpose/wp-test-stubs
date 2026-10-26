<?php

/**
 * Rewrite rule stubs.
 */

/**
 * @link https://developer.wordpress.org/reference/functions/add_rewrite_rule/
 */
function add_rewrite_rule($regex, $query, $after = 'bottom')
{
    global $rewrite_rules;
    $rewrite_rules[] = ['regex' => $regex, 'query' => $query, 'after' => $after];
}

/**
 * Similar to all_added_{actions|filters}, this returns an array of rewrite_rules
 * organized by top/bottom.
 */
function all_rewrite_rules()
{
    global $rewrite_rules;
    $rules = $rewrite_rules ?? [];
    return array_reduce(
        $rules,
        function ($carry, $item) {
            $carry[$item['after']][] = [$item['regex'], $item['query']];
            return $carry;
        },
        ['top' => [], 'bottom' => []],
    );
}
function flush_rewrite_rules(bool $hard = true)
{
    global $flush_rewrite_rules;
    $flush_rewrite_rules = $hard;
}
