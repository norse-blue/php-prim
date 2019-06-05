<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\Functions\string;

class StringPrefixTest extends TestCase
{
    /** @test */
    public function string_prefix()
    {
        $this->assertEquals('hello world', Str::prefix('world', 'hello ')->value);
        $this->assertEquals('hello world', Str::prefix('world', string('hello '))->value);
    }
}
