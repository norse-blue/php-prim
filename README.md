<div align="center">
  <h1>PHP Primitive Objects</h1>
  <p align="center"> 
    <a href="https://circleci.com/gh/norse-blue/php-prim/tree/master"><img alt="Build Status" src="https://img.shields.io/circleci/project/github/norse-blue/php-prim/master.svg?color=%23a3be8c&style=popout-square"></a>
    <a href="https://php.net/releases"><img alt="PHP Version" src="https://img.shields.io/packagist/php-v/norse-blue/prim.svg?color=%23b48ead&style=popout-square"></a>
    <a href="https://packagist.org/packages/norse-blue/prim"><img alt="Stable Release" src="https://img.shields.io/packagist/v/norse-blue/prim.svg?color=%235e81ac&style=popout-square"></a>
    <a href="https://codeclimate.com/github/norse-blue/php-prim/maintainability"><img src="https://api.codeclimate.com/v1/badges/51195ec3a47a8b071381/maintainability" /></a>
    <a href="https://codeclimate.com/github/norse-blue/php-prim/test_coverage"><img src="https://api.codeclimate.com/v1/badges/51195ec3a47a8b071381/test_coverage" /></a>
    <a href="https://packagist.org/packages/norse-blue/prim"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/norse-blue/prim.svg?color=%235e81ac&style=popout-square"></a>
    <a href="https://packagist.org/packages/norse-blue/prim"><img alt="GitHub" src="https://img.shields.io/github/license/norse-blue/php-prim.svg?color=%235e81ac&style=popout-square"></a>
  </p>
</div>
<hr>

**DEPRECATED:** This package was growing too big and has now been deprecated in favor of the following smaller, segmented and more contained packages:
- [norse-blue/collection-objects](https://github.com/norse-blue/php-collection-objects)
- [norse-blue/enum-objects](https://github.com/norse-blue/php-enum-objects)
- [norse-blue/extensible-objects](https://github.com/norse-blue/php-extensible-objects)
- [norse-blue/handy-properties](https://github.com/norse-blue/php-handy-properties)
- [norse-blue/optionals](https://github.com/norse-blue/php-optionals)
- [norse-blue/scalar-objects](https://github.com/norse-blue/php-scalar-objects)
- [norse-blue/value-objects](https://github.com/norse-blue/php-value-objects)

**PHP Prim** is a PHP library that exposes primitive types as immutable objects with convenience methods to operate on them.

## Installation

>Requirements:
>- [PHP 7.3+](https://php.net/releases)
>- [BC Math](https://www.php.net/manual/book.bc.php) extension (for UUIDs)
>- [JSON](https://www.php.net/manual/book.json.php) extension
>- [Multibyte String](https://www.php.net/manual/book.mbstring.php) extension

Install Prim using Composer:

```bash
composer require norse-blue/prim
```

## Usage

There are three ways to create a primitive object instance:

1. Using the `new` keyword:

    ```php
    use NorseBlue\Prim\Scalars\StringObject as Str;
    
    $str = new Str('my string');
    echo $str->upper();
    
    // Outputs:
    // MY STRING
    ```
    
2. Using the facades:

    _**Note:** params passed by reference are not supported in facades because the calls depend on `__callStatic`,
        which does not pass params by reference. See [Overloading][php_overloading_url]._
    
    ```php
    use NorseBlue\Prim\Facades\Scalar\StringFacade as Str;
    
    echo Str::upper('my string');
    
    // Outputs:
    // MY STRING
    ```
    
3. Using the namespaced functions:
    
    ```php
    use NorseBlue\Prim\string;
    
    $str = string('my string');
    echo $str->upper();
    
    // Outputs:
    // MY STRING
    ```

You can also chain methods together:

```php
use NorseBlue\Prim\string;

$str = string('THIS IS MY TEXT.')->lower()->ucfirst();
echo $str;

// Outputs:
// This is my text.
```

You don't need to worry about side-effects for scalar objects, as they are implemented as immutable objects and each method returns
a new object. To store the value don't forget to assign it to a variable or it will be lost.

## Documentation

For the full documentation refer to the [docs](docs) folder.

## Changelog

Please refer to the [CHANGELOG.md](CHANGELOG.md) file for more information about what has changed recently.

## Contributing

Contributions to this project are accepted and encouraged. Please read the [CONTRIBUTING.md](.github/CONTRIBUTING.md)
file for details on contributions.

## Credits

- [Axel Pardemann](https://github.com/axelitus)
- [All Contributors](../../contributors)

## Security

If you discover any security related issues, please email [security@norse.blue](mailto:security@norse.blue) instead
of using the issue tracker.

## Support the development

**Do you like this project? Support it by donating**

<a href="https://www.buymeacoffee.com/axelitus">
    <img src=".assets/buy-me-a-coffee.svg" width="180" alt="Buy me a coffee" />
</a>

## License

PHP Prim is open-sourced software licensed under the [MIT](LICENSE.md) license.

[php_overloading_url]: https://www.php.net/manual/en/language.oop5.overloading.php
