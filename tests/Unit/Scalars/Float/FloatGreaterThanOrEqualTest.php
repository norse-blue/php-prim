<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Float;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class FloatGreaterThanOrEqualTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Float
 */
class FloatGreaterThanOrEqualTest extends TestCase
{
    /** @test */
    public function float_greater_than_or_equal()
    {
        $this->assertFalse(Floating::greaterThanOrEqual(3.0, 9)->value);
        $this->assertFalse(Floating::greaterThanOrEqual(3.0, 9.1)->value);
        $this->assertTrue(Floating::greaterThanOrEqual(9.0, 3)->value);
        $this->assertTrue(Floating::greaterThanOrEqual(9.0, 3.1)->value);
        $this->assertTrue(Floating::greaterThanOrEqual(3.0, 3)->value);
        $this->assertTrue(Floating::greaterThanOrEqual(3.0, 2.9)->value);
        $this->assertTrue(Floating::greaterThanOrEqual(3.0, 3.0)->value);
        $this->assertFalse(Floating::greaterThanOrEqual(3.0, 3.1)->value);
        $this->assertTrue(Floating::greaterThanOrEqual(3.0, -9)->value);
        $this->assertTrue(Floating::greaterThanOrEqual(3.0, -9.1)->value);
        $this->assertFalse(Floating::greaterThanOrEqual(-3.0, 9)->value);
        $this->assertFalse(Floating::greaterThanOrEqual(-3.0, 9.1)->value);
    }
}
