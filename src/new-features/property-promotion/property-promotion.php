<?php

class Video
{
    public function __construct(protected string $title, protected int $duration, protected string $status = 'active')
    {
        assert(!empty($title), 'The title should not be empty.');
        assert($duration > 0, 'The duration must be greater than 0.');
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getRawDuration(): int
    {
        return $this->duration;
    }
}

$title = 'New video';
$duration = 4264;
$video = new Video($title, $duration);

assert($title === $video->getTitle(), 'The title property was not set as expected.');
assert($duration === $video->getRawDuration(),'The duration property was not set as expected.');

echo 'The parameters of the ' . $video::class . ' object were set as expected.' . PHP_EOL;
