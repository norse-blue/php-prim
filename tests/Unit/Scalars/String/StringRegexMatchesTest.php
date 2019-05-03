<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringRegexMatchesTest extends TestCase
{
    /** @test */
    public function string_matches()
    {
        $this->assertEquals([], Str::regexMatches('ac', '/de/'));
        $this->assertEquals(['a'], Str::regexMatches('ac', '/a/'));
        $this->assertEquals([], Str::regexMatches('ac', '/a$/'));
        $this->assertEquals(['ac', 'a', '', 'c'], Str::regexMatches('ac', '/(a)(b)*(c)/'));
        $this->assertEquals(['ac', 'a', null, 'c'], Str::regexMatches('ac', '/(a)(b)*(c)/', PREG_UNMATCHED_AS_NULL));

        $this->assertEquals(['abcde', 'ab', 'name' => 'ab'], Str::regexMatches('abcde', '/(?<name>ab)cde/'));
    }
}
