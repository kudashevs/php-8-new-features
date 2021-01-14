<?php declare(strict_types=1);
/**
 * An artificial example on how union types work with the strict_type declaration set to on.
 * The purpose of this example is to show that the function accepts only declared values.
 * To understand the difference see the union-types-without-strict-types.php example.
 */
function printStringsAndIntegers(string|int $value)
{
    echo $value . PHP_EOL;
}

try {
    printStringsAndIntegers('22');
    printStringsAndIntegers(22);
    printStringsAndIntegers(22.2);
} catch (TypeError) {
    die('The error was caught as expected.' . PHP_EOL);
}

assert(false, 'The error was not caught.');
