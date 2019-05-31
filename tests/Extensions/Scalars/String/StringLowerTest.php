<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringLowerTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringLowerTest extends TestCase
{
    /** @test */
    public function string_lower()
    {
        $this->assertEquals('foo bar baz', Str::lower('FOO BAR BAZ')->value);
        $this->assertEquals('foo bar baz', Str::lower('fOo Bar bAz')->value);
    }
}
