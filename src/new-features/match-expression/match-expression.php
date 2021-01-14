<?php
/**
 * An artificial example on how to use the match operator with predefined default behavior.
 */
$extension = 'jpeg';

$imageType = match($extension) {
    'gif' => 'image/gif',
    'jpg', 'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'svg' => 'image/svg+xml',
    default => throw new \InvalidArgumentException('Unsupported format ' . $extension. ' was provided')
};

assert(
    'image/jpeg' === $imageType,
    'The extension was not processed properly.'
);

echo 'The extension was processed as expected.' . PHP_EOL;
