<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringRemoveTest extends TestCase
{
    /** @test */
    public function string_remove()
    {
        $this->assertEquals('foo foo  foo kal ter son', Str::remove('foo foo bar foo kal ter son', 'bar')->value);
        $this->assertEquals('bar  kal ter', Str::remove('foo foo bar foo kal ter son', ['foo', 'son'])->value);
    }
}
