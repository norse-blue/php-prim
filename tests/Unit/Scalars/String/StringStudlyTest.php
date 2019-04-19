<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringStudlyTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringStudlyTest extends TestCase
{
    /** @test */
    public function test_string_studly()
    {
        $this->assertEquals('LaravelPHPFramework', Str::studly('laravel_p_h_p_framework'));
        $this->assertEquals('LaravelPhpFramework', Str::studly('laravel_php_framework'));
        $this->assertEquals('LaravelPhPFramework', Str::studly('laravel-phP-framework'));
        $this->assertEquals('LaravelPhpFramework', Str::studly('laravel  -_-  php   -_-   framework   '));
        $this->assertEquals('FooBar', Str::studly('fooBar'));
        $this->assertEquals('FooBar', Str::studly('foo_bar'));
        $this->assertEquals('FooBar', Str::studly('foo_bar')); // test cache
        $this->assertEquals('FooBarBaz', Str::studly('foo-barBaz'));
        $this->assertEquals('FooBarBaz', Str::studly('foo-bar_baz'));
    }
}
