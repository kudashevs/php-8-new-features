<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needle = 'quick';

$found = str_contains($haystack, $needle);

assert(true === $found, 'Needle "' . $needle . '"" must exist in the haystack.');

echo 'Needle "' . $needle . '" was found in the haystack.' . PHP_EOL;
