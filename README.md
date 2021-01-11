# PHP 8 new features

This repo contains a docker image with PHP 8 on board and new features examples. More information about PHP 8
new features you can find on [official release page](https://www.php.net/releases/8.0/en.php).

## PHP 8 improvements

### Object classname
Since PHP 8 it's possible to use magic constant ::class (which returns fully qualified class name) on a class instance:
```php
echo $object::class;
```
More information:  
[[example](src/improvements/object-classname.php)]
[[documentation](https://www.php.net/manual/en/language.constants.predefined.php)]
[[rfc](https://wiki.php.net/rfc/class_name_literal_on_object)]

### `throw` becomes an expression
Since PHP 8 throw is not longer a statement but an expression.
More information:
[[example](src/improvements/object-classname.php)]
[[documentation](https://www.php.net/manual/en/language.exceptions.php)]
[[rfc](https://wiki.php.net/rfc/throw_expression)]

### Non-capturing catches
Since PHP 8 it's possible catch exceptions only by type without capturing the object.
More information:  
[[example](src/improvements/non-capturing-catches.php)]
[[documentation](https://www.php.net/manual/en/language.exceptions.php)]
[[rfc](https://wiki.php.net/rfc/non-capturing_catches)]


## New functions

PHP 8 brings us some brand new functions:

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

- fdiv() - divides two numbers according to the IEEE-754 standard (floating-point arithmetic).  
More information:
[[examples](src/new-functions/fdiv/)]
[[documentation]](https://www.php.net/manual/en/function.fdiv.php)
[[pull request](https://github.com/php/php-src/pull/4769)]