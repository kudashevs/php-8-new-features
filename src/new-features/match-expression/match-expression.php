<?php

$extension = 'jpeg';

$imageType = match($extension) {
    'gif' => 'image/gif',
    'jpg', 'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'svg' => 'image/svg+xml',
    default => throw new \InvalidArgumentException('Unsupported format ' . $extension. ' was provided')
};

if ('image/jpeg' === $imageType) {
    echo 'The extension was processed as expected.' . PHP_EOL;
} else {
    trigger_error('The extension was not processed properly.', E_USER_ERROR);
}