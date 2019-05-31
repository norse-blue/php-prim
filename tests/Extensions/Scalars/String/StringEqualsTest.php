<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Class StringEqualsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringEqualsTest extends TestCase
{
    /** @test */
    public function string_equals()
    {
        $this->assertFalse(Str::equals('FGHIJ', 'ABCDE')->value);
        $this->assertFalse(Str::equals('FGHIJ', new StringObject('ABCDE'))->value);
        $this->assertTrue(Str::equals('FGHIJ', 'FGHIJ')->value);
        $this->assertTrue(Str::equals('FGHIJ', new StringObject('FGHIJ'))->value);
        $this->assertFalse(Str::equals('FGHIJ', 'KLMNO')->value);
        $this->assertFalse(Str::equals('FGHIJ', new StringObject('KLMNO'))->value);
    }
}
