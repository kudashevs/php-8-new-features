<?php

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
