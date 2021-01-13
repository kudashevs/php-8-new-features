<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needleAtTheStart = 'the';

$found = str_starts_with($haystack, $needleAtTheStart);

assert(true === $found, 'Needle "' . $needleAtTheStart . '"" must exist at the beginning of the haystack.');

echo 'Needle "' . $needleAtTheStart . '" was found at the beginning of the haystack.' . PHP_EOL;
