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
     * @param string $state
     * @param string $secret
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
    $foo = new Foo();
    $foo->setState('baz');
} catch (AccessDeniedException) {
    die('You don\'t know the secret word.' . PHP_EOL);
}

trigger_error('The AccessDeniedException was not caught.', E_USER_ERROR);
