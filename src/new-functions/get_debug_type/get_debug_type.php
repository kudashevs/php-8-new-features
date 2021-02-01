<?php

namespace Demo {

    class Foo
    {
    }
}

namespace {

    class Bar
    {
    }

    interface Baz
    {
    }

    $std = new stdClass();
    $ref = &$std;

    $fh_stream = tmpfile();
    $fh_closed = fopen(__FILE__, 'r');

    $image = imagecreate(1, 1);
    /*
     * From PHP 8 the GD imagecreate() returns \GdImage object instead of resource.
     */
    assert(is_resource($image) || is_a($image, \GdImage::class), 'The GD image library does not work properly.');

    $tableOfCorrespondences = [
        // scalar types
        ['null', null, 'null'],
        ['true', true, 'bool'],
        ['false', false, 'bool'],
        ['42', 42, 'int'],
        ['3.1415', 3.1415, 'float'],
        ['foo', 'foo', 'string'],
        ['[1, 2]', [1, 2], 'array'],
        // classes and  objects
        ['new stdClass()', $std, 'stdClass'],
        ['reference', $ref, 'stdClass'],
        ['new Bar()', new Bar(), 'Bar'],
        ['new Demo\Foo()', new Demo\Foo(), 'Demo\Foo'],
        ['new class {}', new class {}, 'class@anonymous'],
        ['new class implements Bar {}', new class extends Bar {}, 'Bar@anonymous'],
        ['new class implements Baz {}', new class implements Baz {}, 'Baz@anonymous'],
        ['function () {}', function () {}, 'Closure'],
        ['imagecreate()', $image, 'GdImage'],
        // resources
        ['tmpfile()', $fh_stream, 'resource (stream)'],
        ['fopen(__FILE__, \'r\')', $fh_closed, 'resource (closed)'],
    ];

    fclose($fh_closed);

    foreach ($tableOfCorrespondences as [$example, $value, $expected]) {
        $returned = get_debug_type($value);

        assert(
            $expected === $returned,
            'Expected type "' . $expected . '" for "' . $example. '" does not match the returned value "' . $returned . '".'
        );

        echo $expected . PHP_EOL;
    }

    /*
     * From PHP 8 the imagedestroy() function does nothing.
     */
    unset($image);
    fclose($fh_stream);
}
