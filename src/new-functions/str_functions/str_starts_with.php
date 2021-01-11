<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needle_at_the_start = 'the';

$found = str_starts_with($haystack, $needle_at_the_start);

if (true === $found) {
    echo 'Needle "' . $needle_at_the_start . '" was found at the beginning of the haystack.' . PHP_EOL;
} else {
    trigger_error('Needle "' . $needle_at_the_start . '"" must exist at the beginning of the haystack.', E_USER_ERROR);
}
