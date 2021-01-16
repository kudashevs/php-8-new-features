<?php
/**
 * An artificial example of how the match expression works without a predefined default arm.
 * In contrast with the switch statement, the match expression requires a default case to handle.
 * When the match expression cannot find the default arm it will throw \UnhandledMatchError exception
 * (the \UnhandledMatchError is a new exception class in PHP 8 which extends the \Error class).
 */
$extension = 'wrong';

try {
    $imageType = match($extension) {
        'jpg', 'jpeg' => 'image/jpeg',
        'png' => 'image/png',
    };
} catch (\UnhandledMatchError) {
    die('The UnhandledMatchError exception was caught as expected.' . PHP_EOL);
}

assert(false, 'The UnhandledMatchError exception was not caught.');
