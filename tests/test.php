#!/usr/bin/env php
<?php declare(strict_types=1);

define('VERBOSE', ('cli' === php_sapi_name() && array_intersect(['-v', '--verbose'], $argv)));
define('SOURCE_FOLDER', dirname(__DIR__) . '/src/');

$files = glob(SOURCE_FOLDER . '{,*,*/*,*/*/*,*/*/*/*}.php', GLOB_BRACE);

$executed = 0;
foreach ($files as $file) {
    if (VERBOSE) {
        fwrite(STDOUT, $file . PHP_EOL);
    }

    $output = null; $code = null;
    exec('php ' . $file, $output, $code);

    if ($code !== 0) {
        fwrite(STDERR, sprintf('File %s stopped execution with error %s.' . PHP_EOL, $file, $code));
        exit(1);
    }

    ++$executed;
}

if ($executed !== count($files)) {
    fwrite(STDERR, 'The number of files found does not match the number of executed files.'. PHP_EOL);
    exit(1);
}

fwrite(STDOUT, sprintf('All %s example files were successfully executed.' . PHP_EOL, $executed));
exit(0);
