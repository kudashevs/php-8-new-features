<?php

const DUMMY_FILE = __DIR__ . '/dummy.txt';

if (false === file_exists(DUMMY_FILE)) {
    trigger_error('File ' . DUMMY_FILE . ' doesn\'t exist. Create file and then try again', E_USER_ERROR);
}

$fileHandler = fopen(DUMMY_FILE, 'rb');
$resourceId = get_resource_id($fileHandler);

assert(is_int($resourceId), 'Unexpected handler was returned.');

echo 'The resource id is ' . $resourceId . '.' . PHP_EOL;

fclose($fileHandler);
