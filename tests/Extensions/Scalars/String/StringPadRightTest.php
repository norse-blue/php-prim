<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringPadRightTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringPadRightTest extends TestCase
{
    /** @test */
    public function string_pad_right()
    {
        $this->assertEquals('abc', Str::padRight('abc', 1)->value);
        $this->assertEquals('abc', Str::padRight('abc', 1, '_')->value);
        $this->assertEquals('abc', Str::padRight('abc', 3)->value);
        $this->assertEquals('abc', Str::padRight('abc', 3, '_')->value);
        $this->assertEquals('abc ', Str::padRight('abc', 4)->value);
        $this->assertEquals('abc_', Str::padRight('abc', 4, '_')->value);
        $this->assertEquals('abc  ', Str::padRight('abc', 5)->value);
        $this->assertEquals('abc__', Str::padRight('abc', 5, '_')->value);
        $this->assertEquals('abc    ', Str::padRight('abc', 7)->value);
        $this->assertEquals('abc____', Str::padRight('abc', 7, '_')->value);
    }
}
