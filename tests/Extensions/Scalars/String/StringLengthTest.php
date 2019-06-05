<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\StringObject;

class StringLengthTest extends TestCase
{
    /** @test */
    public function string_length()
    {
        $this->assertEquals(11, Str::length('foo bar baz')->value);
        $this->assertEquals(11, Str::length('foo bar baz', 'UTF-8')->value);
        $this->assertEquals(15, Str::length('Jönköping Malmö')->value);
        $this->assertEquals(15, Str::length('Jönköping Malmö', 'UTF-8')->value);
    }

    /** @test */
    public function string_count()
    {
        $this->assertCount(11, new StringObject('foo bar baz'));
        $this->assertCount(15, new StringObject('Jönköping Malmö'));
    }
}
