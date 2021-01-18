<?php

$mixedTypes = [
    'array' => [42],
    'bool' => true,
    'callable' => fn($x) => $x,
    'int' => 42,
    'float' => 42.2,
    'object' => new stdClass(),
    'resource' => $fp = tmpfile(),
    'string' => 'str',
    'null' => null,
];

function returnSomething(mixed $mixed): mixed
{
    return $mixed;
}

try {
    foreach ($mixedTypes as $mixedName => $mixedValue) {
        returnSomething($mixedValue);
        echo 'The "' . $mixedName . '" type was processed successfully.' . PHP_EOL;
    }
} catch (\Error $e) {
    assert(false, 'One of the types was not processed as expected.');
}

echo 'All types were processed as it was expected.' . PHP_EOL;

fclose($fp);
