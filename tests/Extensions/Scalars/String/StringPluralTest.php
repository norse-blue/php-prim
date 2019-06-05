<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringPluralTest extends TestCase
{
    /** @test */
    public function string_plural()
    {
        $this->assertEquals('codes', Str::plural('code')->value);
        $this->assertEquals('methods', Str::plural('method')->value);
        $this->assertEquals('people', Str::plural('people')->value);
        $this->assertEquals('people', Str::plural('person')->value);
        $this->assertEquals('children', Str::plural('child')->value);
    }
}
