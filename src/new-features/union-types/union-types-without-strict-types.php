<?php declare(strict_types=0);
/**
 * An artificial example on how union types work with set off strict_type declaration.
 * The purpose of this example is to show the weak point of disabling strict_types.
 * Despite of declared union types for the parameter the function accepts an float value.
 */
function printStringsAndIntegers(string|int $value)
{
    echo $value . PHP_EOL;
}

try {
    printStringsAndIntegers(22.2);
    printStringsAndIntegers(null);
} catch (TypeError) {
    die('The error was caught as expected.' . PHP_EOL);
}

assert(false, 'The error was not caught.');
