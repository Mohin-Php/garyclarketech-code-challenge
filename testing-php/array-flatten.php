<?php

/**
 * How can you modify the ArrayFlattener::flatten method
 * so that it can take a multidimensional array and flatten
 * it into a single level array whilst preserving key names
 * like in the $before and $after examples.
 *
 * !!Warning - this will only work IF all key names are unique!!
 *
 * Course: https://www.garyclarke.tech/p/php-complete-testing-bundle
 */
class ArrayFlattener
{
    public static function flatten(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
$before = [
    'key_one' => 1,
    'key_two' => 2,
    'nested_array' => [
        'key_three' => 3,
        'key_four' => 4
    ]
];

$after = [
    'key_one' => 1,
    'key_two' => 2,
    'key_three' => 3,
    'key_four' => 4
];

$result = ArrayFlattener::flatten($before);
print $result == $after ? "Its Match" : "Its not Match";