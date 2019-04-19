<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringCamelTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringCamelTest extends TestCase
{
    /** @test */
    public function test_string_camel()
    {
        $this->assertEquals('laravelPHPFramework', Str::camel('Laravel_p_h_p_framework'));
        $this->assertEquals('laravelPhpFramework', Str::camel('Laravel_php_framework'));
        $this->assertEquals('laravelPhPFramework', Str::camel('Laravel-phP-framework'));
        $this->assertEquals('laravelPhpFramework', Str::camel('Laravel  -_-  php   -_-   framework   '));
        $this->assertEquals('fooBar', Str::camel('FooBar'));
        $this->assertEquals('fooBar', Str::camel('foo_bar'));
        $this->assertEquals('fooBar', Str::camel('foo_bar')); // test cache
        $this->assertEquals('fooBarBaz', Str::camel('Foo-barBaz'));
        $this->assertEquals('fooBarBaz', Str::camel('foo-bar_baz'));
    }
}
