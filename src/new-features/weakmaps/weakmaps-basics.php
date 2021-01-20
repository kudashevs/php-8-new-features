<?php
/**
 * A very basic stuff on how the WeakMap class works. This is a new PHP 8 feature which requires some explanations.
 * From the RFC (https://wiki.php.net/rfc/weak_maps): Weak maps allow creating a map from objects to arbitrary values
 * (similar to SplObjectStorage) without preventing the objects that are used as keys from being garbage collected.
 * If an object key is garbage collected, it will simply be removed from the map.
 *
 */
$weakMap = new \WeakMap();

$firstObject = new stdClass();
$secondObject = new stdClass();

/*
 * The WeakMap uses objects as keys for associate arbitrary values.
 */
$weakMap[$firstObject] = 'first';
$weakMap[$secondObject] = 'second';

assert('first' === $weakMap[$firstObject], 'The first WeakMap key was not set as expected.');
assert(2 === count($weakMap), 'The WeakMap must contain 2 elements.');

/*
 * When the object is destroyed and garbage collected it will be removed from the map.
 */
unset($firstObject);
assert(1 === count($weakMap), 'The WeakMap must contain 1 element.');

/*
 * When the key object is removed from a WeakMap it does not impact the original object.
 */
unset($weakMap[$secondObject]);
assert(0 === count($weakMap), 'The WeakMap must contain no elements.');
assert(is_object($secondObject), 'The $secondObject must exist and be an object.');

echo 'The sequence was processed as expected.' . PHP_EOL;
