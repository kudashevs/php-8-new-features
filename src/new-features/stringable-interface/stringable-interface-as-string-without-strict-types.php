<?php declare(strict_types=0);
/**
 * An artificial example on how the Stringable interface works with the strict_type declaration set to off.
 * The important thing about it, that in this case Stringable object could be considered as a string type.
 */
class Foo
{
    private string $data = 'private data';

    public function __toString(): string
    {
        return $this->data;
    }
}

function processStrings(string $input): string
{
    return $input;
}

try {
    $objectImplementingToString = new Foo();
    $output = processStrings($objectImplementingToString);
} catch (\TypeError) {
    assert(false, 'The Stringable object was not processed properly.');
}

echo 'The Stringable object was processed as expected.' . PHP_EOL;
