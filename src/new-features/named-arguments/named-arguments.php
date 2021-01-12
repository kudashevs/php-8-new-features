<?php
/**
 * Artificial example on how to solve array functions inconsistency with named arguments.
 */

$sequence = [
    1, 2, 3, 4, 5
];

$mapped = array_map(array: $sequence, callback: function ($v)
{
    return $v * 3;
});

$filtered = array_filter(array: $mapped, callback: function ($v)
{
    return $v < 10;
});

if (3 === count($filtered)) {
    echo 'The sequence was processed as expected.' . PHP_EOL;
} else {
    trigger_error('The sequence was not processed properly.', E_USER_ERROR);
}

