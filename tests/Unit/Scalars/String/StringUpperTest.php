<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringUpperTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringUpperTest extends TestCase
{
    /** @test */
    public function string_upper()
    {
        $this->assertEquals('FOO BAR BAZ', Str::upper('foo bar baz')->value);
        $this->assertEquals('FOO BAR BAZ', Str::upper('foO bAr BaZ')->value);
    }
}
