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
assert(
    in_array('Stringable', class_implements($objectImplementingToString), true),
    'The class ' . $objectImplementingToString::class . ' must implement the Stringable interface.'
);

echo 'An instance of "' . $objectImplementingToString::class . '" implements the Stringable interface.' . PHP_EOL;
