<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Float;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class FloatLessThanTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Float
 */
class FloatLessThanTest extends TestCase
{
    /** @test */
    public function float_less_than()
    {
        $this->assertFalse(Floating::lessThan(9, 3)->value);
        $this->assertFalse(Floating::lessThan(9, 3.1)->value);
        $this->assertTrue(Floating::lessThan(3, 9)->value);
        $this->assertTrue(Floating::lessThan(3, 9.1)->value);
        $this->assertFalse(Floating::lessThan(3, 3)->value);
        $this->assertFalse(Floating::lessThan(3, 2.9)->value);
        $this->assertFalse(Floating::lessThan(3, 3.0)->value);
        $this->assertTrue(Floating::lessThan(3, 3.1)->value);
        $this->assertFalse(Floating::lessThan(9, -3)->value);
        $this->assertFalse(Floating::lessThan(9, -3.0)->value);
        $this->assertTrue(Floating::lessThan(-9, 3)->value);
        $this->assertTrue(Floating::lessThan(-9, 3.0)->value);
    }
}
