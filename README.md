<div align="center">
  <img src=".assets/prim-logo.png">
  <p align="center"> 
    <a href="https://circleci.com/gh/norse-blue/php-prim/tree/master"><img alt="Build Status" src="https://img.shields.io/circleci/project/github/norse-blue/php-prim/master.svg?color=%23a3be8c&style=popout-square"></a>
    <a href="https://php.net/releases"><img alt="PHP Version" src="https://img.shields.io/packagist/php-v/norse-blue/prim.svg?color=%23b48ead&style=popout-square"></a>
    <a href="https://packagist.org/packages/norse-blue/prim"><img alt="Stable Release" src="https://img.shields.io/packagist/v/norse-blue/prim.svg?color=%235e81ac&style=popout-square"></a>
    <a href="https://packagist.org/packages/norse-blue/prim"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/norse-blue/prim.svg?color=%235e81ac&style=popout-square"></a>
    <a href="https://packagist.org/packages/norse-blue/prim"><img alt="GitHub" src="https://img.shields.io/github/license/norse-blue/php-prim.svg?color=%235e81ac&style=popout-square"></a>
  </p>
</div>
<hr>

**PHP Prim** is a PHP library that exposes primitive object data types for your convenience.

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

There are three ways to create a primitive object data type instance

1. Using the `new` keyword:

    ```php
    use NorseBlue\Prim\Scalars\StringObject as Str;
    
    $str = new Str('my string');
    echo $str->upper();
    
    // Outputs:
    // MY STRING
    ```
    
2. Using the facades:
    
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

## Documentation

For the full documentation refer to the [docs](docs) folder.

## Changelog

Please refer to the [CHANGELOG.md](CHANGELOG.md) file for more information about what has changed recently.

## Contributing

Contributions to this project are accepted and encouraged. Please read the [CONTRIBUTING.md](.github/CONTRIBUTING.md) file for details on contributions.

## Credits

- [Axel Pardemann](https://github.com/axelitus)
- [All Contributors](../../contributors)

## Security

If you discover any security related issues, please email [security@norse.blue](mailto:security@norse.blue) instead of using the issue tracker.

## Support the development

**Do you like this project? Support it by donating**

<a href="https://www.buymeacoffee.com/axelitus"><img src=".assets/buy-me-a-coffee.svg" width="180" alt="Buy me a coffee"></img></a>

## License

PHP Prim is open-sourced software licensed under the [MIT](LICENSE.md) license.
