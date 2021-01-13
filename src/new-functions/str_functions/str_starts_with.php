<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needle_at_the_start = 'the';

$found = str_starts_with($haystack, $needle_at_the_start);

assert(true === $found, 'Needle "' . $needle_at_the_start . '"" must exist at the beginning of the haystack.');

echo 'Needle "' . $needle_at_the_start . '" was found at the beginning of the haystack.' . PHP_EOL;
