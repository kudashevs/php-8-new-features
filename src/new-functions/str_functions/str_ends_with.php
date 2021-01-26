<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needleAtTheEnd = 'dog';

$found = str_ends_with($haystack, $needleAtTheEnd);

assert(true === $found, 'The needle "' . $needleAtTheEnd . '"" must exist at the end of the haystack.');

echo 'The needle "' . $needleAtTheEnd . '" was found at the end of the haystack.' . PHP_EOL;
