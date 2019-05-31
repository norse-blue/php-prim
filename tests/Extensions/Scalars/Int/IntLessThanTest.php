<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class IntLessThanTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
class IntLessThanTest extends TestCase
{
    /** @test */
    public function int_less_than()
    {
        $this->assertFalse(Integer::lessThan(9, 3)->value);
        $this->assertFalse(Integer::lessThan(9, 3.1)->value);
        $this->assertTrue(Integer::lessThan(3, 9)->value);
        $this->assertTrue(Integer::lessThan(3, 9.1)->value);
        $this->assertFalse(Integer::lessThan(3, 3)->value);
        $this->assertFalse(Integer::lessThan(3, 2.9)->value);
        $this->assertFalse(Integer::lessThan(3, 3.0)->value);
        $this->assertTrue(Integer::lessThan(3, 3.1)->value);
        $this->assertFalse(Integer::lessThan(9, -3)->value);
        $this->assertFalse(Integer::lessThan(9, -3.0)->value);
        $this->assertTrue(Integer::lessThan(-9, 3)->value);
        $this->assertTrue(Integer::lessThan(-9, 3.0)->value);
    }
}
