<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needleAtTheEnd = 'dog';

$found = str_ends_with($haystack, $needleAtTheEnd);

assert(true === $found, 'Needle "' . $needleAtTheEnd . '"" must exist at the end of the haystack.');

echo 'Needle "' . $needleAtTheEnd . '" was found at the end of the haystack.' . PHP_EOL;
