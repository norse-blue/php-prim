<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\string;

/**
 * Class StringSuffixTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringSuffixTest extends TestCase
{
    /** @test */
    public function string_suffix()
    {
        $this->assertEquals('hello world', Str::suffix('hello', ' world')->value);
        $this->assertEquals('hello world', Str::suffix('hello', string(' world'))->value);
    }
}
