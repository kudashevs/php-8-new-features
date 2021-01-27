# PHP 8 new features [![Build Status](https://www.travis-ci.org/kudashevs/php-8-new-features.svg?branch=master)](https://www.travis-ci.org/kudashevs/php-8-new-features)

This repo contains a list of PHP 8 new features, as well as their usage examples. More information about PHP 8
new features you can find on [the official release page](https://www.php.net/releases/8.0/en.php). Also, the repo
contains a Dockerfile that allows you to build a PHP 8 image with all these examples (it gives you the possibility
to get familiar with the latest changes in PHP 8 and how they work without installing it on your computer). 

### Table of Contents  
[Image usage](#image-usage)  
[New features in PHP 8](#new-features-in-php-8)  
[New functions in PHP 8](#new-functions-in-php-8)  
[PHP 8 improvements](#php-8-improvements)

## Image usage

This repo contains a Dockerfile that allows you build a PHP 8 image with all its code. To build an image you need
Docker software to be installed on your computer. For more information on how to build and use the container from this repo,
please refer to the documentation in [USAGE.md](USAGE.md). For more information on how to use the Docker software,
please refer to [docker docs](https://docs.docker.com) site and [Get started](https://docs.docker.com/get-started/) section.   


## New features in PHP 8

### *Attributes*
PHP 8 allows us to provide structured metadata to classes, properties, constants, methods, functions, and parameters
declarations through the special new brand syntax. It gives us the possibility to read the metadata through Reflection API
and use this metadata at runtime.      
More information:
[[examples](src/new-features/attributes)]
[[documentation](https://www.php.net/manual/en/language.attributes.php)]
[[rfc](https://wiki.php.net/rfc/attributes_v2)]


### *Named arguments*
PHP 8 allows us to pass specific names/identifiers for functions or methods arguments. It gives us the possibility
to identify the arguments and provide them in any order we like. We can even provide only the required arguments
and skip optional ones.  
```php
explode(separator: ' ', string: 'a b');
explode(string: 'a b', separator: ' ');
```
Additional information:
- make code shorter and more readable
- can be set from an associative array with values
- help to solve the inconsistency in some cases
- they are compatible with default values

More information:
[[examples](src/new-features/named-arguments)]
[[documentation](https://www.php.net/manual/en/functions.arguments.php)]
[[rfc](https://wiki.php.net/rfc/named_params)]


### *Constructor property promotion*
PHP 8 allows us to declare and initialize class properties with specific type and visibility right from the class
constructor method signature. This gives us the possibility to write less boilerplate code.   
```php
class Test {
    public function __construct(protected int $x = 0, protected int $y = 0) {
    }
}
```
Additional information:
- makes code significantly shorter and therefore more readable
- removes boilerplate code
- facilitates an instantiation process

More information:
[[examples](src/new-features/property-promotion)]
[[documentation](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)]
[[rfc](https://wiki.php.net/rfc/constructor_promotion)]


### *Union types*
PHP 8 allows us to mix multiple different types in type declarations (parameters, properties and return types).
This gives us the possibility of using the wide range of types combinations that are validated at runtime.
```php
function doSomething(int|float|string|Stringable|null $input): string|null
{
    /* process $input */
}
```
Additional information:
- make code more flexible and secure
- accept multiple types including pseudo types
- allow us chaining build-in or our-own types
- use strict_types to make type-check even stronger
- **caution:** `null` cannot be used as a standalone type

More information:
[[examples](src/new-features/union-types)]
[[documentation](https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.union)]
[[rfc](https://wiki.php.net/rfc/union_types_v2)]


### *Nullsafe operator*
PHP 8 allows us to safely chain method calls/properties when the return value could be `null`. Instead of writing 
a sequence of null check conditionals we can use the brand new nullsafe operator `?->` at any place of the chain.
```php
return $car->getEngine()?->getOilFilter()?->getManufacturer()?->name;
```
Additional information:
- makes code more secure and reliable
- could be applied at any place of the chain
- stops if encounters `null` without any errors  
and evaluates the entire chain to `null` value

More information:
[[examples](src/new-features/nullsafe-operator)]
[documentation]
[[rfc](https://wiki.php.net/rfc/nullsafe_operator)]


### *WeakMap class*
PHP 8 introduces a new WeakMap class that works similar to the splObjectStorage (allows associate arbitrary value
with object key), but does not prevent the garbage collector from collecting the object key  when it should be removed.
```php
$map = new WeakMap();
$obj = new stdClass();
$map[$obj] = 42;
```
Additional information:
- a brand new build-in array like class
- accepts only objects as keys
- does not prevent the GC to collect an object 
- suits perfectly for self-cleaning cache

More information:
[[examples](src/new-features/weakmaps)]
[documentation]
[[rfc](https://wiki.php.net/rfc/weak_maps)]


### *Match expression*
PHP 8 allows us to change the switch statement for a more convenient and secure `match` expression.   
```php
$result = match($condition) {
    /* process $condition */
}
```
Additional information:
- match is shorter and more convenient/readable
- uses the strict type-safe comparison (===)
- the result could be assigned to a variable or returned
- match arms do not fall-through to later cases
- throws \UnhandledMatchError if a default is not found

More information:
[[examples](src/new-features/match-expression)]
[[documentation](https://www.php.net/manual/en/control-structures.match.php)]
[[rfc](https://wiki.php.net/rfc/match_expression_v2)]


### *Stringable interface*
Since PHP 8 any class which implements a __toString() method implements the `Stringable` interface automatically.
It allows us to type-hint the input data for functions and methods that can accept/return strings.

Additional information:
- can be automatically implemented or explicitly declared 
- can be treated as a string when declare('strict_types') is off
- cannot be treated as a string when declare('strict_types') is on
- can be found in the get_declared_interfaces() return array
- a probable disadvantage that it is a little bit magical

More information:
[[example](src/new-features/stringable-interface/stringable-interface.php)]
[documentation]
[[rfc](https://wiki.php.net/rfc/stringable)]


## New functions in PHP 8

PHP 8 brings us some brand-new functions:

- fdiv() - divides two numbers according to the IEEE-754 standard (floating-point arithmetic).  
More information:
[[examples](src/new-functions/fdiv/)]
[[documentation]](https://www.php.net/manual/en/function.fdiv.php)
[[pull request](https://github.com/php/php-src/pull/4769)]

- str_contains() - determines if a string contains a given substring (case-sensitive).  
More information:
[[examples](src/new-functions/str_functions/)]
[[documentation](https://www.php.net/manual/en/function.str-contains.php)]
[[rfc](https://wiki.php.net/rfc/str_contains)]

- str_starts_with() - determines if a string starts with a given substring (case-sensitive).  
More information:
[[examples](src/new-functions/str_functions/)]
[[documentation](https://www.php.net/manual/en/function.str-starts-with.php)]
[[rfc](https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions)]

- str_ends_with() - determines if a string ends with a given substring (case-sensitive).  
More information:
[[examples](src/new-functions/str_functions/)]
[[documentation](https://www.php.net/manual/en/function.str-ends-with.php)]
[[rfc](https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions)]

- get_resource_id() - returns an integer identifier for given resource.  
More information:
[[examples](src/new-functions/get_resource_id/)]
[[documentation](https://www.php.net/manual/en/function.get-resource-id.php)]
[[pull request](https://github.com/php/php-src/pull/5427)]

- get_debug_type() - determines the internal/exact type of a variable (improved gettype()).  
More information:
[[examples](src/new-functions/get_debug_type/)]
[documentation]
[[rfc](https://wiki.php.net/rfc/get_debug_type)]


## PHP 8 improvements

### *JIT (just in time compilation)*
PHP 8 introduces a new JIT compiler which is an independent part of OPCache. The idea under the JIT is to translate
PHP byte-code before it runs into native code (just like C/C++ produces). It gives a significant performance improvement
for heavy cpu applications. However, it increases complexity and makes code support and maintenance more difficult.
The JIT is disabled by default. 
```php.ini
opcache.enable=1
opcache.jit_buffer_size=64M
opcache.jit=tracing
```


### *Object classname*
Since PHP 8 it is possible to use magic constant `::class` (which returns the fully qualified class name) on a class instance:
```php
echo $object::class;
```
More information:
[[example](src/improvements/object-classname.php)]
[[documentation](https://www.php.net/manual/en/language.constants.predefined.php)]
[[rfc](https://wiki.php.net/rfc/class_name_literal_on_object)]


### *Non-capturing catches*
Since PHP 8 it is possible to catch exceptions only by their type without capturing the object.
```php
try {
    /* do something */
} catch (SpecificException) {
    echo "A SpecificException was thrown.";
}
```  
More information:
[[example](src/improvements/non-capturing-catches.php)]
[[documentation](https://www.php.net/manual/en/language.exceptions.php)]
[[rfc](https://wiki.php.net/rfc/non-capturing_catches)]


### *`throw` becomes an expression*
Since PHP 8 `throw` is no longer a statement but an expression.
```php
$value = $nullable ?? throw new SpecificException();
```
More information:
[[example](src/improvements/throw-expression.php)]
[[documentation](https://www.php.net/manual/en/language.exceptions.php)]
[[rfc](https://wiki.php.net/rfc/throw_expression)]


### New `static` return 
Since PHP 8 it is possible to specify the `static` return type. It can be used only as a return type.
More information:
[[example](src/improvements/return-static.php)]
[[documentation](https://www.php.net/manual/en/language.types.declarations.php)]
[[rfc](https://wiki.php.net/rfc/static_return_type)]


### *New `mixed` type*
Since PHP 8 it is possible to use the `mixed` type which is equivalent to the union type declaration  
array|bool|callable|int|float|object|resource|string|null. The `mixed` type can be used for type-hinting
a return type, functions or methods arguments or a property type.
```php
function doSomething(mixed $input): mixed 
{
    /* process $input */
}
```
More information:
[[example](src/improvements/mixed-type.php)]
[[documentation](https://www.php.net/manual/en/language.types.declarations.php)]
[[rfc](https://wiki.php.net/rfc/mixed_type_v2)]


### *Trailing commas in parameter list*
Since PHP 8 it is possible to use trailing commas not only in function calls, but in a function declaration
parameters list and in a closure use() list as well. This improves language consistency.
```php
function doSomething(
    string $foo,
    int $bar,
    int $baz,
) {
    /* process data */
}
```
More information:
[[documentation](https://www.php.net/manual/en/functions.arguments.php)]
[[rfc parameter list](https://wiki.php.net/rfc/trailing_comma_in_parameter_list)]
[[rfc use list](https://wiki.php.net/rfc/trailing_comma_in_closure_use_list)]
