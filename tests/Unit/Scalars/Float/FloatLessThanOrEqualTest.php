<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Float;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class FloatLessThanOrEqualTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Float
 */
class FloatLessThanOrEqualTest extends TestCase
{
    /** @test */
    public function float_less_than_or_equal()
    {
        $this->assertFalse(Floating::lessThanOrEqual(9.0, 3)->value);
        $this->assertFalse(Floating::lessThanOrEqual(9.0, 3.1)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 9)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 9.1)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 3)->value);
        $this->assertFalse(Floating::lessThanOrEqual(3.0, 2.9)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 3.0)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 3.1)->value);
        $this->assertFalse(Floating::lessThanOrEqual(9.0, -3)->value);
        $this->assertFalse(Floating::lessThanOrEqual(9.0, -3.1)->value);
        $this->assertTrue(Floating::lessThanOrEqual(-9.0, 3)->value);
        $this->assertTrue(Floating::lessThanOrEqual(-9.0, 3.1)->value);
    }
}
