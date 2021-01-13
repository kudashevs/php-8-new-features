<?php

namespace Foo;

class Bar
{
}

$object = new Bar();

echo 'Object\'s class name is "' . $object::class . '".' . PHP_EOL;
