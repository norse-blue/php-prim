<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Numeric;

use NorseBlue\Prim\Facades\Scalars\NumericFacade as Numeric;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\FloatObject;
use NorseBlue\Prim\Types\Scalars\IntObject;

class NumericAbsTest extends TestCase
{
    /** @test */
    public function numeric_abs()
    {
        $this->assertInstanceOf(IntObject::class, Numeric::abs(9));
        $this->assertInstanceOf(FloatObject::class, Numeric::abs(9.3));
        $this->assertEquals(9, Numeric::abs(9)->value);
        $this->assertEquals(9.0, Numeric::abs(9.0)->value);
        $this->assertEquals(9, Numeric::abs(9)->value);
        $this->assertEquals(9.0, Numeric::abs(-9.0)->value);
    }
}
