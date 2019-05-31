<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringPadTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Numeric
 */
class StringPadTest extends TestCase
{
    /** @test */
    public function string_pad()
    {
        $this->assertEquals('abc', Str::pad('abc', 1)->value);
        $this->assertEquals('abc', Str::pad('abc', 3)->value);
        $this->assertEquals(' abc ', Str::pad('abc', 5)->value);
        $this->assertEquals('_abc_', Str::pad('abc', 5, '_')->value);
        $this->assertEquals('abc ', Str::pad('abc', 4)->value);
        $this->assertEquals('abc_', Str::pad('abc', 4, '_')->value);
        $this->assertEquals('  abc  ', Str::pad('abc', 7)->value);
        $this->assertEquals('##abc##', Str::pad('abc', 7, '#')->value);
        $this->assertEquals('abc', Str::pad('abc', 3, '_', STR_PAD_LEFT)->value);
        $this->assertEquals('__abc', Str::pad('abc', 5, '_', STR_PAD_LEFT)->value);
        $this->assertEquals('abc', Str::pad('abc', 3, '_', STR_PAD_RIGHT)->value);
        $this->assertEquals('abc__', Str::pad('abc', 5, '_', STR_PAD_RIGHT)->value);
    }
}
