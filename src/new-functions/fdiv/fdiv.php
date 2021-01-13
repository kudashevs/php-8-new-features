<?php
/*
 * According to IEEE-754 standard on Floating-Point Arithmetic the fdiv() function will treat
 * division by zero as legal operation. The function returns NAN or ±INF mandated by IEEE-754.
 */
$remainder = fdiv(2, 0);

if (INF === $remainder) {
    echo 'The division result is "' . (string)$remainder . '".' . PHP_EOL;
} else {
    trigger_error('The division result "' . (string)$remainder . '" is not INF.', E_USER_ERROR);
}
