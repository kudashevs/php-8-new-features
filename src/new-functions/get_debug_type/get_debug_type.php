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

    $fp_stream = tmpfile();
    $fp_closed = fopen(__FILE__, 'r');

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
        ['new stdClass()', new stdClass(), 'stdClass'],
        ['new Bar()', new Bar(), 'Bar'],
        ['new Demo\Foo()', new Demo\Foo(), 'Demo\Foo'],
        ['new class {}', new class {}, 'class@anonymous'],
        ['new class implements Bar {}', new class extends Bar {}, 'Bar@anonymous'],
        ['new class implements Baz {}', new class implements Baz {}, 'Baz@anonymous'],
        ['function () {}', function () {}, 'Closure'],
        // resources
        ['tmpfile()', $fp_stream, 'resource (stream)'],
        ['fopen(__FILE__, \'r\')', $fp_closed, 'resource (closed)'],
    ];

    fclose($fp_closed);

    foreach ($tableOfCorrespondences as [$example, $value, $expected]) {
        $returned = get_debug_type($value);

        assert(
            $expected === $returned,
            'Expected type "' . $expected . '" for "' . $example. '" does not match the returned value "' . $returned . '".'
        );

        echo $expected . PHP_EOL;
    }

    fclose($fp_stream);
}
