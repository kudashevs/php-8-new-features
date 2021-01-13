<?php
/*
 * On PHP version lower than 8.0 this code will produce an error:
 * Parse error: syntax error, unexpected '=>' (T_DOUBLE_ARROW)
 * because throw is a statement and not an expression.
 */
try {
    $value = false ?: throw new InvalidArgumentException();
} catch (InvalidArgumentException) {
    die('The exception was thrown as expected because throw is an expression.' . PHP_EOL);
}

assert(false, 'The exception was not caught.');
