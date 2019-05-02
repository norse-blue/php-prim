<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringFinishTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringFinishTest extends TestCase
{
    /** @test */
    public function string_finish()
    {
        $this->assertEquals('abbc', Str::finish('ab', 'bc')->value);
        $this->assertEquals('abbc', Str::finish('abbcbc', 'bc')->value);
        $this->assertEquals('abcbbc', Str::finish('abcbbcbc', 'bc')->value);
    }
}
