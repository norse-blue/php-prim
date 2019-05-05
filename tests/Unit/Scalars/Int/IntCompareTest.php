<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class IntCompareTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
class IntCompareTest extends TestCase
{
    /** @test */
    public function int_compare()
    {
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
        $this->assertEquals(0, Integer::compare(5, 5.5)->value);

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
