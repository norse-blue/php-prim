<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Float;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;

class FloatGreaterThanTest extends TestCase
{
    /** @test */
    public function float_greater_than()
    {
        $this->assertFalse(Floating::greaterThan(3.0, 9)->value);
        $this->assertFalse(Floating::greaterThan(3.0, 9.1)->value);
        $this->assertTrue(Floating::greaterThan(9.0, 3)->value);
        $this->assertTrue(Floating::greaterThan(9.0, 3.1)->value);
        $this->assertFalse(Floating::greaterThan(3.0, 3)->value);
        $this->assertTrue(Floating::greaterThan(3.0, 2.9)->value);
        $this->assertFalse(Floating::greaterThan(3.0, 3.0)->value);
        $this->assertFalse(Floating::greaterThan(3.0, 3.1)->value);
        $this->assertTrue(Floating::greaterThan(3.0, -9)->value);
        $this->assertTrue(Floating::greaterThan(3.0, -9.1)->value);
        $this->assertFalse(Floating::greaterThan(-3.0, 9)->value);
        $this->assertFalse(Floating::greaterThan(-3.0, 9.1)->value);
    }
}
