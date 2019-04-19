<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringUcfirstTest extends TestCase
{
    /** @test */
    public function string_ucfirst()
    {
        $this->assertEquals('Laravel', Str::ucfirst('laravel'));
        $this->assertEquals('Laravel framework', Str::ucfirst('laravel framework'));
        $this->assertEquals('Мама', Str::ucfirst('мама'));
        $this->assertEquals('Мама мыла раму', Str::ucfirst('мама мыла раму'));
    }
}
