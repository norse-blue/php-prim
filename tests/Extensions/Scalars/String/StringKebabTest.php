<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringKebabTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringKebabTest extends TestCase
{
    /** @test */
    public function string_kebab()
    {
        $this->assertEquals('laravel-php-framework', Str::kebab('LaravelPhpFramework')->value);
    }
}
