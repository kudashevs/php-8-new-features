<?php

const DUMMY_FILE = __DIR__ . '/dummy.txt';

if (false === file_exists(DUMMY_FILE)) {
    trigger_error('File ' . DUMMY_FILE . ' doesn\'t exist. Create file and then try again', E_USER_ERROR);
}

$handle = fopen(DUMMY_FILE, 'rb');

echo 'handle: ' . get_resource_id($handle) . PHP_EOL;

fclose($handle);
