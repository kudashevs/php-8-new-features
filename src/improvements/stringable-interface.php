<?php

class Foo
{
    private $data = 'data';

    public function __toString(): string
    {
        return $this->data;
    }
}

$objectImplementingToString = new Foo();

/*
 * Any class which implements the __toString() method implements the Stringable interface automatically.
 */
if (in_array('Stringable', class_implements($objectImplementingToString), true)) {
    echo 'An instance of "' . $objectImplementingToString::class . '" implements the Stringable interface.' . PHP_EOL;
} else {
    trigger_error('The Stringable interface must be implemented on ' . $objectImplementingToString::class . ' instance.', E_USER_ERROR);
}
