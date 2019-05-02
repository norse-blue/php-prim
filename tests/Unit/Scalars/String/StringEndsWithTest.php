<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringEndsWith
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringEndsWithTest extends TestCase
{
    /** @test */
    public function ends_with()
    {
        $this->assertTrue(Str::endsWith('jason', 'on')->value);
        $this->assertTrue(Str::endsWith('jason', 'jason')->value);
        $this->assertTrue(Str::endsWith('jason', ['on'])->value);
        $this->assertTrue(Str::endsWith('jason', ['no', 'on'])->value);
        $this->assertFalse(Str::endsWith('jason', 'no')->value);
        $this->assertFalse(Str::endsWith('jason', ['no'])->value);
        $this->assertFalse(Str::endsWith('jason', '')->value);
        $this->assertFalse(Str::endsWith('7', ' 7')->value);
        $this->assertTrue(Str::endsWith('a7', '7')->value);

        // Test for multibyte string support
        $this->assertTrue(Str::endsWith('Jönköping', 'öping')->value);
        $this->assertTrue(Str::endsWith('Malmö', 'mö')->value);
        $this->assertFalse(Str::endsWith('Jönköping', 'oping')->value);
        $this->assertFalse(Str::endsWith('Malmö', 'mo')->value);
    }
}
