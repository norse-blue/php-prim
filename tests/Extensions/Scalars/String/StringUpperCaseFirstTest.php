<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringUpperCaseFirstTest extends TestCase
{
    /** @test */
    public function string_upper_case_first()
    {
        $this->assertEquals('Laravel', Str::upperCaseFirst('laravel')->value);
        $this->assertEquals('Laravel framework', Str::upperCaseFirst('laravel framework')->value);
        $this->assertEquals('Мама', Str::upperCaseFirst('мама')->value);
        $this->assertEquals('Мама мыла раму', Str::upperCaseFirst('мама мыла раму')->value);
    }
}
