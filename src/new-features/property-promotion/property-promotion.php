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

assert(
    $title === $video->getTitle() && $duration === $video->getRawDuration(),
    'The parameters were not processed properly.'
);

echo 'The parameters were set as expected.' . PHP_EOL;
