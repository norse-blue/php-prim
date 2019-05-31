<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\BoolObject;

/**
 * Class FloatEqualsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
class FloatEqualsTest extends TestCase
{
    /** @test */
    public function float_equals()
    {
        $this->assertInstanceOf(BoolObject::class, Floating::equals(5, 5));
        $this->assertInstanceOf(BoolObject::class, Floating::equals(5.0, 5));
        $this->assertInstanceOf(BoolObject::class, Floating::equals(5, 5.0));
        $this->assertInstanceOf(BoolObject::class, Floating::equals(5.0, 5.0));
        $this->assertInstanceOf(BoolObject::class, Floating::equals(10, 5));
        $this->assertInstanceOf(BoolObject::class, Floating::equals(10.0, 5));
        $this->assertInstanceOf(BoolObject::class, Floating::equals(10, 5.0));
        $this->assertInstanceOf(BoolObject::class, Floating::equals(10.0, 5.0));

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
