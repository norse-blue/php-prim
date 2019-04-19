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
        $this->assertTrue(Str::startsWith('jason', 'jas'));
        $this->assertTrue(Str::startsWith('jason', 'jason'));
        $this->assertTrue(Str::startsWith('jason', ['jas']));
        $this->assertTrue(Str::startsWith('jason', ['day', 'jas']));
        $this->assertFalse(Str::startsWith('jason', 'day'));
        $this->assertFalse(Str::startsWith('jason', ['day']));
        $this->assertFalse(Str::startsWith('jason', ''));
        $this->assertFalse(Str::startsWith('7', ' 7'));
        $this->assertTrue(Str::startsWith('7a', '7'));

        // Test for multibyte string support
        $this->assertTrue(Str::startsWith('Jönköping', 'Jö'));
        $this->assertTrue(Str::startsWith('Malmö', 'Malmö'));
        $this->assertFalse(Str::startsWith('Jönköping', 'Jonko'));
        $this->assertFalse(Str::startsWith('Malmö', 'Malmo'));
    }
}
