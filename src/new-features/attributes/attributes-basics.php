<?php
/**
 * A very basic stuff on how the Attributes work. This is a new PHP 8 feature which requires some explanations.
 * From the documentation: The attributes allow to add structured, machine-readable metadata information on declarations
 * in code. The metadata defined by attributes can then be inspected at runtime using the Reflection APIs.
 */

/**
 * To become a special Attribute class the class should be marked with #[Attribute] declaration. This declaration
 * accepts a special bitmask argument which can be used to restrict the type of declaration an attribute can be
 * assigned to and to mark it repeatable (by default an attribute can be used only once per declaration).
 */
#[\Attribute()]
class SimpleAttribute
{
    private $attributeValue;

    public function __construct(string $data)
    {
        $this->attributeValue = $data;
    }

    public function getAttributeValue(): string
    {
        return $this->attributeValue;
    }
}

/**
 * When the special Attribute class is declared it can be used to add metadata for various declarations in code.
 * The declarations of classes, properties, methods, functions, parameters, and class constants are supported.
 */
#[SimpleAttribute('value from attribute')]
class Foo
{
}

/**
 * The metadata can be inspected and retrieved at runtime using the getAttributes() method on a Reflection object.
 * This method returns an array of ReflectionAttribute instances (not instances of Attribute classes) that can be
 * queried for attribute name, arguments and to instantiate an instance of the specified Attribute class.
 */
$reflection = new \ReflectionObject(new Foo());
$attributes = $reflection->getAttributes();

/**
 * The Reflection APIs provides the special method newInstance() which is used to instantiate an Attribute class.
 */
$instance = $attributes[0]->newInstance();
assert(
    SimpleAttribute::class === get_class($instance),
    'The instantiated Attribute class must be an instance of ' . SimpleAttribute::class . '.'
);

$attributeValue = $instance->getAttributeValue();
assert(
    'value from attribute' === $attributeValue,
    'The ' . Foo::class . ' class attribute\'s argument must be "value from attribute".'
);

echo 'The ' . Foo::class . ' class attribute was processed as expected.' . PHP_EOL;
