<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Float;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\FloatObject;

/**
 * Class FloatAbsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Float
 */
class FloatAbsTest extends TestCase
{
    /** @test */
    public function float_abs()
    {
        $this->assertInstanceOf(FloatObject::class, Floating::abs(9));
        $this->assertInstanceOf(FloatObject::class, Floating::abs(9.3));
        $this->assertEquals(9, Floating::abs(9)->value);
        $this->assertEquals(9.0, Floating::abs(9.0)->value);
        $this->assertEquals(9, Floating::abs(9)->value);
        $this->assertEquals(9.0, Floating::abs(-9.0)->value);
    }
}
