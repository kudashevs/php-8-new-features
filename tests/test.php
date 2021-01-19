<?php

define('SOURCE_FOLDER', dirname(__DIR__) . '/src/');

$files = glob(SOURCE_FOLDER . '{,*,*/*,*/*/*,*/*/*/*}.php', GLOB_BRACE);

$executed = 0;
foreach ($files as $file) {
    $output = null; $code = null;
    exec('php ' . $file, $output, $code);

    if ($code !== 0) {
        echo 'File ' . $file . ' stopped execution with error ' . $code . '.' . PHP_EOL;
        exit(1);
    }

    ++$executed;
}

if ($executed !== count($files)) {
    echo 'The number of files found does not match the number of executed files.'. PHP_EOL;
    exit(1);
}

echo 'All ' . $executed . ' example files were successfully executed.' . PHP_EOL;
exit(0);
