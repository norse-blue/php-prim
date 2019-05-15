<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class IntGreaterThanTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
class IntGreaterThanTest extends TestCase
{
    /** @test */
    public function int_greater_than()
    {
        $this->assertFalse(Integer::greaterThan(3, 9)->value);
        $this->assertFalse(Integer::greaterThan(3, 9.1)->value);
        $this->assertTrue(Integer::greaterThan(9, 3)->value);
        $this->assertTrue(Integer::greaterThan(9, 3.1)->value);
        $this->assertFalse(Integer::greaterThan(3, 3)->value);
        $this->assertTrue(Integer::greaterThan(3, 2.9)->value);
        $this->assertFalse(Integer::greaterThan(3, 3.0)->value);
        $this->assertFalse(Integer::greaterThan(3, 3.1)->value);
        $this->assertTrue(Integer::greaterThan(3, -9)->value);
        $this->assertTrue(Integer::greaterThan(3, -9.1)->value);
        $this->assertFalse(Integer::greaterThan(-3, 9)->value);
        $this->assertFalse(Integer::greaterThan(-3, 9.1)->value);
    }
}
