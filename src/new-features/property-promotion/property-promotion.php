<?php

class Video
{
    public function __construct(protected string $title, protected int $duration, protected string $status = 'active')
    {
        assert(!empty($title));
        assert($duration > 0);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDuration(): string
    {
        return gmdate("H:i:s", $this->duration);
    }

    public function getRawDuration(): int
    {
        return $this->duration;
    }
}

$title = 'New video';
$duration = 4264;

$video = new Video($title, $duration);

if ($title === $video->getTitle() && $duration === $video->getRawDuration()) {
    echo 'The parameters were set as expected.' . PHP_EOL;
} else {
    trigger_error('The parameters were not processed properly.', E_USER_ERROR);
}
