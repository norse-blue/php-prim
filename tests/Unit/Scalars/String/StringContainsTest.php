<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringContainsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringContainsTest extends TestCase
{
    /** @test */
    public function string_contains()
    {
        $this->assertTrue(Str::contains('taylor', 'ylo')->value);
        $this->assertTrue(Str::contains('taylor', 'taylor')->value);
        $this->assertTrue(Str::contains('taylor', ['ylo'])->value);
        $this->assertTrue(Str::contains('taylor', ['xxx', 'ylo'])->value);
        $this->assertFalse(Str::contains('taylor', 'xxx')->value);
        $this->assertFalse(Str::contains('taylor', ['xxx'])->value);
        $this->assertFalse(Str::contains('taylor', '')->value);
    }
}
