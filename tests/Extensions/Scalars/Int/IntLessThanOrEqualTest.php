<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class IntLessThanOrEqualTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
class IntLessThanOrEqualTest extends TestCase
{
    /** @test */
    public function int_less_than_or_equal()
    {
        $this->assertFalse(Integer::lessThanOrEqual(9, 3)->value);
        $this->assertFalse(Integer::lessThanOrEqual(9, 3.1)->value);
        $this->assertTrue(Integer::lessThanOrEqual(3, 9)->value);
        $this->assertTrue(Integer::lessThanOrEqual(3, 9.1)->value);
        $this->assertTrue(Integer::lessThanOrEqual(3, 3)->value);
        $this->assertFalse(Integer::lessThanOrEqual(3, 2.9)->value);
        $this->assertTrue(Integer::lessThanOrEqual(3, 3.0)->value);
        $this->assertTrue(Integer::lessThanOrEqual(3, 3.1)->value);
        $this->assertFalse(Integer::lessThanOrEqual(9, -3)->value);
        $this->assertFalse(Integer::lessThanOrEqual(9, -3.1)->value);
        $this->assertTrue(Integer::lessThanOrEqual(-9, 3)->value);
        $this->assertTrue(Integer::lessThanOrEqual(-9, 3.1)->value);
    }
}
