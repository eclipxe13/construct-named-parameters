# eclipxe/construct-named-parameters - Helper functions to create objects using an array as named parameters

[![Source Code][badge-source]][source]
[![Latest Version][badge-release]][release]
[![Software License][badge-license]][license]
[![Build Status][badge-build]][build]
[![Scrutinizer][badge-quality]][quality]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]
[![SensioLabsInsight][badge-sensiolabs]][sensiolabs]

PHP does not have the option to call a method or instance an object using named parameters.
This is a library I use in other projects to simplify the task of create objects based on named parameters.

See [PHP RFC: Named Parameters](https://wiki.php.net/rfc/named_params)

# Instalation

Use composer to install this library `composer require eclipxe/construct-named-parameters`

# Basic use

```php
<?php

class Foo
{
    public function __construct($a, $b, $c, $d) {}
}

$foo = construct_named_parameters(Foo::class, [
    'd' => 123,
    'b' => 'second',
    'a' => 'a argument',
    'c' => false,
    'xtra' => 'baz',
]);

// this will return the result of:
new Foo('a argument', 'second', false, 123);

```

# Why this library exists?

My motivation start in a project that contains a lot of domain objects that need to be instantiated
and commonly I had all the information in one single array. This library result very useful in those cases.

It even contains a method that put all parameters and values as lowercase to easily match the constructor
requirement. Be aware that in some weird cases a constructor can contain two parameters with the same name
but in different case.

## How it knows the constructor arguments?

The only way I found is using `\Reflection`.

The bad is that reflection can be expensive.

The good part is that the function `\ConstructNamedParameters\Builder::retrieveArguments` has a cache
of the name of the class, so, it will only investigate the constructor the first time and the second
will use the cached information.

The cache can not be cleaned or forced to reload, and there is no need to do it.
 A constructor of a class cannot change once it exists, right?

## About the public functions:

| Public function                     | Actual calls
|---                                  |---
| `construct_named_parameters`        | `\ConstructNamedParameters\Builder::create`
| `construct_named_parameters_uncase` | `\ConstructNamedParameters\Builder::createIgnoreCase`
| `constructor_arguments`             | `\ConstructNamedParameters\Builder::retrieveArguments`

## Contributing

Contributions are welcome! Please read [CONTRIBUTING][] for details
and don't forget to take a look in the [TODO][] and [CHANGELOG][] files.

## Copyright and License

The construct-named-parameters library is copyright © [Carlos C Soto](https://eclipxe.com.mx/)
and licensed for use under the MIT License (MIT). Please see [LICENSE][] for more information.

[contributing]: https://github.com/eclipxe13/construct-named-parameters/blob/master/CONTRIBUTING.md
[changelog]: https://github.com/eclipxe13/construct-named-parameters/blob/master/CHANGELOG.md
[todo]: https://github.com/eclipxe13/construct-named-parameters/blob/master/TODO.md

[source]: https://github.com/eclipxe13/construct-named-parameters
[release]: https://github.com/eclipxe13/construct-named-parameters/releases
[license]: https://github.com/eclipxe13/construct-named-parameters/blob/master/LICENSE
[build]: https://travis-ci.org/eclipxe13/construct-named-parameters
[quality]: https://scrutinizer-ci.com/g/eclipxe13/construct-named-parameters?branch=master
[sensiolabs]: https://insight.sensiolabs.com/projects/31ffd665-f238-441d-a64c-2f9e3f101b89
[coverage]: https://scrutinizer-ci.com/g/eclipxe13/construct-named-parameters/code-structure/master/code-coverage
[downloads]: https://packagist.org/packages/eclipxe/construct-named-parameters

[badge-source]: http://img.shields.io/badge/source-eclipxe13/construct--named--parameters-blue.svg?style=flat-square
[badge-release]: https://img.shields.io/github/release/eclipxe13/construct-named-parameters.svg?style=flat-square
[badge-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/eclipxe13/construct-named-parameters/master.svg?style=flat-square
[badge-quality]: https://img.shields.io/scrutinizer/g/eclipxe13/construct-named-parameters/master.svg?style=flat-square
[badge-sensiolabs]: https://insight.sensiolabs.com/projects/31ffd665-f238-441d-a64c-2f9e3f101b89/mini.png
[badge-coverage]: https://img.shields.io/scrutinizer/coverage/g/eclipxe13/construct-named-parameters/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/eclipxe/construct-named-parameters.svg?style=flat-square
