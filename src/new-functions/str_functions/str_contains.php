<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needle = 'quick';

$found = str_contains($haystack, $needle);

assert(true === $found, 'The needle "' . $needle . '"" must exist in the haystack.');

echo 'The needle "' . $needle . '" was found in the haystack.' . PHP_EOL;
