<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;

class IntGreaterThanOrEqualTest extends TestCase
{
    /** @test */
    public function int_greater_than_or_equal()
    {
        $this->assertFalse(Integer::greaterThanOrEqual(3, 9)->value);
        $this->assertFalse(Integer::greaterThanOrEqual(3, 9.1)->value);
        $this->assertTrue(Integer::greaterThanOrEqual(9, 3)->value);
        $this->assertTrue(Integer::greaterThanOrEqual(9, 3.1)->value);
        $this->assertTrue(Integer::greaterThanOrEqual(3, 3)->value);
        $this->assertTrue(Integer::greaterThanOrEqual(3, 2.9)->value);
        $this->assertTrue(Integer::greaterThanOrEqual(3, 3.0)->value);
        $this->assertFalse(Integer::greaterThanOrEqual(3, 3.1)->value);
        $this->assertTrue(Integer::greaterThanOrEqual(3, -9)->value);
        $this->assertTrue(Integer::greaterThanOrEqual(3, -9.1)->value);
        $this->assertFalse(Integer::greaterThanOrEqual(-3, 9)->value);
        $this->assertFalse(Integer::greaterThanOrEqual(-3, 9.1)->value);
    }
}
