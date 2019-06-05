<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringKebabTest extends TestCase
{
    /** @test */
    public function string_kebab()
    {
        $this->assertEquals('laravel-php-framework', Str::kebab('LaravelPhpFramework')->value);
    }
}
