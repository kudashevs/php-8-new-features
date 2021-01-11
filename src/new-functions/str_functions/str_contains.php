<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needle = 'quick';

$found = str_contains($haystack, $needle);

if (true === $found) {
    echo 'Needle "' . $needle . '" was found in the haystack.' . PHP_EOL;
} else {
    trigger_error('Needle "' . $needle . '"" must exist in the haystack.', E_USER_ERROR);
}
