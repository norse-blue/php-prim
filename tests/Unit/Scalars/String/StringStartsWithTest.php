<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringStartsWith
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringStartsWithTest extends TestCase
{
    /** @test */
    public function starts_with()
    {
        $this->assertTrue(Str::startsWith('jason', 'jas')->value);
        $this->assertTrue(Str::startsWith('jason', 'jason')->value);
        $this->assertTrue(Str::startsWith('jason', ['jas'])->value);
        $this->assertTrue(Str::startsWith('jason', ['day', 'jas'])->value);
        $this->assertFalse(Str::startsWith('jason', 'day')->value);
        $this->assertFalse(Str::startsWith('jason', ['day'])->value);
        $this->assertFalse(Str::startsWith('jason', '')->value);
        $this->assertFalse(Str::startsWith('7', ' 7')->value);
        $this->assertTrue(Str::startsWith('7a', '7')->value);

        // Test for multibyte string support
        $this->assertTrue(Str::startsWith('Jönköping', 'Jö')->value);
        $this->assertTrue(Str::startsWith('Malmö', 'Malmö')->value);
        $this->assertFalse(Str::startsWith('Jönköping', 'Jonko')->value);
        $this->assertFalse(Str::startsWith('Malmö', 'Malmo')->value);
    }
}
