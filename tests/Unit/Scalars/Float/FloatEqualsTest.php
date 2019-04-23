<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;

class FloatEqualsTest extends TestCase
{
    /** @test */
    public function float_equals()
    {
        $this->assertTrue(Floating::equals(5.0, 5.0)->value);
        $this->assertTrue(Floating::equals(5.0, 5)->value);

        $this->assertFalse(Floating::equals(5.0, -5.0)->value);
        $this->assertFalse(Floating::equals(5.0, -5.5)->value);
        $this->assertFalse(Floating::equals(5.0, -5)->value);

        $this->assertFalse(Floating::equals(-5.0, 5.0)->value);
        $this->assertFalse(Floating::equals(-5.0, 5.5)->value);
        $this->assertFalse(Floating::equals(-5.0, 5)->value);
    }
}
