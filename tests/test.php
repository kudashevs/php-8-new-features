<?php

define('SOURCE_FOLDER', dirname(__DIR__) . '/src/');

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(SOURCE_FOLDER));

foreach ($iterator as $file) {
    if (checkShouldContinue($file)) continue;
    $output = null; $code = null;
    exec('php ' . $file->getPathname(), $output, $code);

    if ($code !== 0) {
        exit(1);
    }
}

echo 'All example files were executed successfully.' . PHP_EOL;
exit(0);

/*
 * Helpers section.
 */
function checkShouldContinue(\SplFileInfo $file): bool
{
    return $file->isDir() || $file->getExtension() !== 'php';
}
