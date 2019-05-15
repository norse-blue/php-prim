<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Float;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;

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
        $this->assertEquals(9, Floating::abs(9)->value);
        $this->assertEquals(9.0, Floating::abs(9.0)->value);
        $this->assertEquals(9, Floating::abs(9)->value);
        $this->assertEquals(9.0, Floating::abs(-9.0)->value);
    }
}
