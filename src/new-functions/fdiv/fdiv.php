<?php

$remainder = fdiv(2, 0);

if (INF === $remainder) {
    echo 'The division result is "' . (string)$remainder . '".' . PHP_EOL;
} else {
    trigger_error('The division result "' . (string)$remainder . '" is not INF.', E_USER_ERROR);
}
