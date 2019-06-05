<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringLowerTest extends TestCase
{
    /** @test */
    public function string_lower()
    {
        $this->assertEquals('foo bar baz', Str::lower('FOO BAR BAZ')->value);
        $this->assertEquals('foo bar baz', Str::lower('fOo Bar bAz')->value);
    }
}
