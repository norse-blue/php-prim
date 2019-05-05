<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringUcfirstTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringUcfirstTest extends TestCase
{
    /** @test */
    public function string_ucfirst()
    {
        $this->assertEquals('Laravel', Str::ucfirst('laravel')->value);
        $this->assertEquals('Laravel framework', Str::ucfirst('laravel framework')->value);
        $this->assertEquals('Мама', Str::ucfirst('мама')->value);
        $this->assertEquals('Мама мыла раму', Str::ucfirst('мама мыла раму')->value);
    }
}
