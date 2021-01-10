<?php

$haystack = 'the quick brown fox jumps over the lazy dog';
$needle_at_the_end = 'dog';

$found = str_ends_with($haystack, $needle_at_the_end);

if (true === $found) {
    echo 'Needle "' . $needle_at_the_end . '" was found at the end of the haystack.';
} else {
    trigger_error('Needle "' . $needle_at_the_end . '"" must exist at the end of the haystack.', E_USER_ERROR);
}
