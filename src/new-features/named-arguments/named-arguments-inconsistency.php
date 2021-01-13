<?php
/**
 * Artificial example on how to solve array functions inconsistency with named arguments.
 */
$sequence = [
    1, 2, 3, 4, 5
];

$mapped = array_map(array: $sequence, callback: fn($v) => $v * 3);

$filtered = array_filter(array: $mapped, callback: fn($v) => $v < 10);

assert(3 === count($filtered), 'The sequence was not processed properly.');

echo 'The sequence was processed as expected.' . PHP_EOL;
