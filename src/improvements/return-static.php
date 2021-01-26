<?php

class Foo
{
    public static function revealSelf(): self
    {
        return new self();
    }

    public static function revealStatic(): static
    {
        return new static();
    }
}

class Bar extends Foo
{
}

assert(true === Bar::revealSelf() instanceof Foo, 'The revealSelf() method must return a Foo instance.');
echo 'The revealSelf() method returned an instance of "' . Foo::class . '" as expected.' . PHP_EOL;

assert(true === Bar::revealStatic() instanceof Bar, 'The revealStatic() method must return a Bar instance.');
echo 'The revealStatic() method returned an instance of "' . Bar::class . '" as expected.' . PHP_EOL;
