<?php

class Foo
{
    private $data = 'data';

    public function __toString(): string
    {
        return $this->data;
    }
}

$stringable = new Foo();

/*
 * Any class which implements a __toString() method implements the Stringable interface automatically.
 */
if (in_array('Stringable', class_implements($stringable), true)) {
    echo 'An instance of "' . $stringable::class . '" implements the Stringable interface.' . PHP_EOL;
} else {
    trigger_error('The Stringable interface must be implemented on ' . $stringable::class . ' instance.', E_USER_ERROR);
}
