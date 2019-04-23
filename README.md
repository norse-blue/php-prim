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

## License

PHP Prim is open-sourced software licensed under the [MIT](LICENSE.md) license.