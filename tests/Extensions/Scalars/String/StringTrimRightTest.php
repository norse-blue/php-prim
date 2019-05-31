<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringTrimRightTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringTrimRightTest extends TestCase
{
    /** @test */
    public function string_trim_right()
    {
        $this->assertEquals("\t\tThese are a few words :) ...", Str::trimRight("\t\tThese are a few words :) ...  ")->value);
        $this->assertEquals("\t\tThese are a few words :)", Str::trimRight("\t\tThese are a few words :) ...  ", " \t.")->value);
        $this->assertEquals("Hello Wor", Str::trimRight("Hello World", "Hdle")->value);
        $this->assertEquals("Hello Worl", Str::trimRight("Hello World", "HdWr")->value);

        // trim the ASCII control characters at the end (from 0 to 31 inclusive)
        $this->assertEquals("\x09Example string", Str::trimRight("\x09Example string\x0A", "\x00..\x1F")->value);
    }
}
