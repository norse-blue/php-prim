<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringCamelTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringCamelTest extends TestCase
{
    /** @test */
    public function test_string_camel()
    {
        $this->assertEquals('laravelPHPFramework', Str::camel('Laravel_p_h_p_framework')->value);
        $this->assertEquals('laravelPhpFramework', Str::camel('Laravel_php_framework')->value);
        $this->assertEquals('laravelPhPFramework', Str::camel('Laravel-phP-framework')->value);
        $this->assertEquals('laravelPhpFramework', Str::camel('Laravel  -_-  php   -_-   framework   ')->value);
        $this->assertEquals('fooBar', Str::camel('FooBar')->value);
        $this->assertEquals('fooBar', Str::camel('foo_bar')->value);
        $this->assertEquals('fooBarBaz', Str::camel('Foo-barBaz')->value);
        $this->assertEquals('fooBarBaz', Str::camel('foo-bar_baz')->value);
    }
}
