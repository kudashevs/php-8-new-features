<?php

class Foo
{
    private string $data = 'private data';

    public function __toString(): string
    {
        return $this->data;
    }
}

$objectImplementingToString = new Foo();

/*
 * Any class which implements the __toString() method will implement the Stringable interface automatically.
 * The easiest way to find whether an object implements \Stringable interface is to use class_implements() function.
 */
assert(
    in_array('Stringable', class_implements($objectImplementingToString), true),
    'The class ' . $objectImplementingToString::class . ' must implement the Stringable interface.'
);

echo 'An instance of "' . $objectImplementingToString::class . '" implements the Stringable interface.' . PHP_EOL;
