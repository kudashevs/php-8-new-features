<?php
/**
 * An artificial example of how to use the match expression with a predefined default arm.
 * The match expression gives the possibility to return a default value or throw an exception
 * of any type as a default behavior. If the default case is not defined the match expression
 * will throw UnhandledMatchError exception, which can be caught and processed.
 */
$extension = 'jpeg';

$imageType = match($extension) {
    'jpg', 'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    default => throw new \InvalidArgumentException('Unsupported format ' . $extension. ' was provided')
};

assert(
    'image/jpeg' === $imageType,
    'The extension was not processed properly.'
);

echo 'The extension was processed as expected.' . PHP_EOL;
