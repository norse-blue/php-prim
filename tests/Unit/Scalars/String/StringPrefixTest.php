<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\string;

/**
 * Class StringPrefixTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringPrefixTest extends TestCase
{
    /** @test */
    public function string_prefix()
    {
        $this->assertEquals('hello world', Str::prefix('world', 'hello ')->value);
        $this->assertEquals('hello world', Str::prefix('world', string('hello '))->value);
    }
}
