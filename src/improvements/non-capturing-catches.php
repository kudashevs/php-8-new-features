<?php

class AccessDeniedException extends \Exception
{
}

class Foo
{
    private $state = 'state';

    /**
     * @throws AccessDeniedException
     */
    public function setState(string $state, string $secret = '')
    {
        if ($secret !== 'secret') {
            throw new AccessDeniedException();
        }

        $this->state = $state;
    }
}

try {
    (new Foo())->setState('baz');
} catch (AccessDeniedException) {
    die('The exception was caught as expected.' . PHP_EOL);
}

assert(false, 'The exception was not caught.');
