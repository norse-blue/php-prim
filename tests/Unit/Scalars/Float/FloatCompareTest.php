<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class FloatCompareTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
class FloatCompareTest extends TestCase
{
    /** @test */
    public function float_compare()
    {
        $this->assertGreaterThan(0, Floating::compare(10.0, 5.0)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, 5.5)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, 5)->value);

        $this->assertGreaterThan(0, Floating::compare(10.0, -5.0)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, -5.5)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, -5)->value);

        $this->assertGreaterThan(0, Floating::compare(5.0, -5.0)->value);
        $this->assertGreaterThan(0, Floating::compare(5.0, -5.5)->value);
        $this->assertGreaterThan(0, Floating::compare(5.0, -5)->value);

        $this->assertEquals(0, Floating::compare(5.0, 5.0)->value);
        $this->assertEquals(0, Floating::compare(5.0, 5)->value);

        $this->assertLessThan(0, Floating::compare(-5.0, 5.0)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 5.5)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 5)->value);

        $this->assertLessThan(0, Floating::compare(5.0, 10.0)->value);
        $this->assertLessThan(0, Floating::compare(5.0, 10.5)->value);
        $this->assertLessThan(0, Floating::compare(5.0, 10)->value);

        $this->assertLessThan(0, Floating::compare(-5.0, 10.0)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 10.5)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 10)->value);
    }
}
