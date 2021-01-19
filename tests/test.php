<?php

define('SOURCE_FOLDER', dirname(__DIR__) . '/src/');

$files = glob(SOURCE_FOLDER . '{,*,*/*,*/*/*,*/*/*/*}.php', GLOB_BRACE);

foreach ($files as $file) {
    $output = null; $code = null;
    exec('php ' . $file, $output, $code);

    if ($code !== 0) {
        echo 'File ' . $file . ' stopped execution with error ' . $code . '.' . PHP_EOL;
        exit(1);
    }
}

echo 'All example files were executed successfully.' . PHP_EOL;
exit(0);
