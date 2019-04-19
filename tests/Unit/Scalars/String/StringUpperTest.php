<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringUpperTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringUpperTest extends TestCase
{
    /** @test */
    public function string_upper()
    {
        $this->assertEquals('FOO BAR BAZ', Str::upper('foo bar baz'));
        $this->assertEquals('FOO BAR BAZ', Str::upper('foO bAr BaZ'));
    }
}