<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\FloatFacade as Floating;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\FloatObject;

class FloatCompareTest extends TestCase
{
    /** @test */
    public function float_compare()
    {
        $this->assertInstanceOf(FloatObject::class, Floating::compare(10, 5));
        $this->assertInstanceOf(FloatObject::class, Floating::compare(5, 5));
        $this->assertInstanceOf(FloatObject::class, Floating::compare(5, 10));
        $this->assertInstanceOf(FloatObject::class, Floating::compare(10.0, 5.0));
        $this->assertInstanceOf(FloatObject::class, Floating::compare(5.0, 5.0));
        $this->assertInstanceOf(FloatObject::class, Floating::compare(5.0, 10.0));

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
