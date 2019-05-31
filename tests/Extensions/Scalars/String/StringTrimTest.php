<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringTrimExtension
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringTrimTest extends TestCase
{
    /** @test */
    public function string_trim()
    {
        $this->assertEquals("These are a few words :) ...", Str::trim("\t\tThese are a few words :) ...  ")->value);
        $this->assertEquals("These are a few words :)", Str::trim("\t\tThese are a few words :) ...  ", " \t.")->value);
        $this->assertEquals("o Wor", Str::trim("Hello World", "Hdle")->value);
        $this->assertEquals("ello Worl", Str::trim("Hello World", "HdWr")->value);

        // trim the ASCII control characters at the beginning and end (from 0 to 31 inclusive)
        $this->assertEquals("Example string", Str::trim("\x09Example string\x0A", "\x00..\x1F")->value);
    }
}
