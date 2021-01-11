<?php
/*
 * On PHP versions lower than 8.0 this code will produce an error:
 * Parse error: syntax error, unexpected '=>' (T_DOUBLE_ARROW)
 * because throw is a statement and not an expression.
 */
try {
    $trueValue = true;
    $value = $trueValue ?: throw new InvalidArgumentException('The exception should not be thrown');
} catch (\Exception $e) {
    trigger_error($e->getMessage(), E_USER_ERROR);
}

echo 'Exception was not thrown because it is an expression.' . PHP_EOL;