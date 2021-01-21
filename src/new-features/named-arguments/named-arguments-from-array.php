<?php
/**
 * An artificial example on how to set up a class constructor using named arguments
 * and how to unpack arguments from an associative array with the unpacking operator.
 */
class SimpleImage
{
    public function __construct(
        protected string $name,
        protected string $type,
        protected int $width,
        protected int $height,
        protected float $transparency = 1,
        protected string $background = '#000',
        protected bool $watermark = false,
    ) {}

    public function getProperties(): array
    {
        return get_object_vars($this);
    }
}

/*
 * An associative array with the named arguments (contains key => value pairs).
 * It must not contain any unknown parameters, otherwise an error will be thrown.
 */
$imageWithWatermark = [
    'watermark' => true,
    'height' => '200',
    'width' => '200',
    'name' => 'logo-with-watermark',
    'type' => 'png',
];

/*
 * The constructor is populated with named arguments through the unpacking operator.
 */
$image = new SimpleImage(...$imageWithWatermark);

$properties = $image->getProperties();

/*
 * The order of keys and the number of values must be the same as in the constructor.
 */
assert('name' === array_key_first($properties), 'The properties were not set as expected.');
assert('watermark' === array_key_last($properties), 'The properties were not set as expected.');
assert(7 === count($properties), 'The array of properties must contain 7 elements.');

echo 'The named arguments were populated as expected.' . PHP_EOL;
