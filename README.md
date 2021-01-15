# PHP 8 new features

This repo contains a list of PHP 8 new features, as well as their usage examples. More information about PHP 8
new features you can find on [the official release page](https://www.php.net/releases/8.0/en.php). Also, the repo
contains a Dockerfile that allows you to build a PHP 8 image with all these examples (it gives you the possibility
to get familiar with the latest changes in PHP 8 and how they work, without installing it on your computer). 

## Usage

To start using docker containers you need Docker software installed on your computer. More information on 
how to use a container in [USAGE.md](USAGE.md) or in [Get started](https://docs.docker.com/get-started/).   

## PHP 8 improvements

### *Object classname*
Since PHP 8 it's possible to use magic constant `::class` (which returns the fully qualified class name) on a class instance:
```php
echo $object::class;
```
More information:
[[example](src/improvements/object-classname.php)]
[[documentation](https://www.php.net/manual/en/language.constants.predefined.php)]
[[rfc](https://wiki.php.net/rfc/class_name_literal_on_object)]


### *Non-capturing catches*
Since PHP 8 it's possible catch exceptions only by type without capturing the object.
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


### *Stringable interface*
Since PHP 8 any class which implements a __toString() method implements the `Stringable` interface automatically.
It allows us to type-hint easily the types for functions and methods that can accept/return strings.

Additional information:
- it can be found in get_declared_interfaces() return value
- a probable disadvantage that it is a little bit magical

More information:
[[example](src/improvements/stringable-interface.php)]
[documentation]
[[rfc](https://wiki.php.net/rfc/stringable)]


## New features in PHP 8

### *Named arguments*
PHP 8 allows us to pass names for functions and methods call arguments. It allows us to provide only the
required parameters in any order we like and skip optional parameters.  
```php
explode(separator: ' ', string: 'a b');
explode(string: 'a b', separator: ' ');
```
Additional information:
- makes code shorter and more readable
- could help to solve inconsistency in some cases

More information:
[[examples](src/new-features/named-arguments)]
[[documentation](https://www.php.net/manual/en/functions.arguments.php)]
[[rfc](https://wiki.php.net/rfc/named_params)]


### *Constructor property promotion*
PHP 8 allows us to declare and initialize class properties with specific type and visibility right from the class
constructor method signature. This allows us writing less boilerplate code.   
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
This allows us using the wide range of types combinations that are validated at runtime.
```php
function doSomething(int|float|string|Stringable|null $input): string|null
{
    /* process $input */
}
```
Additional information:
- makes code more flexible and secure
- accepts multiple types including pseudo types
- allows us chaining build-in and our own types
- use strict_types to make type-check even stronger
- caution: `null` cannot be used as a standalone type

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


### *Match expression*
PHP 8 allows us to change the switch statement for a more convenient and secure `match` expression.   
```php
$result = match($condition) {
    /* process $condition */
}
```
Additional information:
- match is shorter and more convenient/readable
- the result could be assigned to a variable or returned
- uses the strict type-safe comparison (===)
- match arms do not fall-through to later cases

More information:
[[examples](src/new-features/match-expression)]
[[documentation](https://www.php.net/manual/en/control-structures.match.php)]
[[rfc](https://wiki.php.net/rfc/match_expression_v2)]


## New functions in PHP 8

PHP 8 brings us some brand new functions:

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

