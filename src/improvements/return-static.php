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

assert(Foo::class === get_class(Bar::revealSelf()), 'The revealSelf() method must return a Foo instance.');
echo 'The revealSelf() method returned an instance of "' . Foo::class . '" as expected.' . PHP_EOL;

assert(Bar::class === get_class(Bar::revealStatic()), 'The revealStatic() method must return a Bar instance.');
echo 'The revealStatic() method returned an instance of "' . Bar::class . '" as expected.' . PHP_EOL;
