<?php

class AccessDeniedException extends \Exception
{
}

class Foo
{
    private $state = 'state';

    public function getState(): string
    {
        return $this->state;
    }

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

trigger_error('The AccessDeniedException was not caught.', E_USER_ERROR);
