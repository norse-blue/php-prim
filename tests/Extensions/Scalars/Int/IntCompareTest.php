<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\IntObject;

class IntCompareTest extends TestCase
{
    /** @test */
    public function int_compare()
    {
        $this->assertInstanceOf(IntObject::class, Integer::compare(10, 5));
        $this->assertInstanceOf(IntObject::class, Integer::compare(5, 5));
        $this->assertInstanceOf(IntObject::class, Integer::compare(5, 10));

        $this->assertGreaterThan(0, Integer::compare(10, 5)->value);
        $this->assertGreaterThan(0, Integer::compare(10, 5.0)->value);
        $this->assertGreaterThan(0, Integer::compare(10, 5.5)->value);

        $this->assertGreaterThan(0, Integer::compare(10, -5)->value);
        $this->assertGreaterThan(0, Integer::compare(10, -5.0)->value);
        $this->assertGreaterThan(0, Integer::compare(10, -5.5)->value);

        $this->assertGreaterThan(0, Integer::compare(5, -5)->value);
        $this->assertGreaterThan(0, Integer::compare(5, -5.0)->value);
        $this->assertGreaterThan(0, Integer::compare(5, -5.5)->value);

        $this->assertEquals(0, Integer::compare(5, 5)->value);
        $this->assertEquals(0, Integer::compare(5, 5.0)->value);

        $this->assertLessThan(0, Integer::compare(-5, 5)->value);
        $this->assertLessThan(0, Integer::compare(-5, 5.0)->value);
        $this->assertLessThan(0, Integer::compare(-5, 5.5)->value);

        $this->assertLessThan(0, Integer::compare(5, 10)->value);
        $this->assertLessThan(0, Integer::compare(5, 10.0)->value);
        $this->assertLessThan(0, Integer::compare(5, 10.5)->value);

        $this->assertLessThan(0, Integer::compare(-5, 10)->value);
        $this->assertLessThan(0, Integer::compare(-5, 10.0)->value);
        $this->assertLessThan(0, Integer::compare(-5, 10.5)->value);
    }
}
