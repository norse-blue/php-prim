<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringTrimLeftTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringTrimLeftTest extends TestCase
{
    /** @test */
    public function string_trim_left()
    {
        $this->assertEquals("These are a few words :) ...  ", Str::trimLeft("\t\tThese are a few words :) ...  ")->value);
        $this->assertEquals("These are a few words :) ...  ", Str::trimLeft("\t\tThese are a few words :) ...  ", " \t.")->value);
        $this->assertEquals("o World", Str::trimLeft("Hello World", "Hdle")->value);
        $this->assertEquals("ello World", Str::trimLeft("Hello World", "HdWr")->value);

        // trim the ASCII control characters at the beginning (from 0 to 31 inclusive)
        $this->assertEquals("Example string\x0A", Str::trimLeft("\x09Example string\x0A", "\x00..\x1F")->value);
    }
}
