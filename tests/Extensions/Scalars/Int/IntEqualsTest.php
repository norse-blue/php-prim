<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\BoolObject;

/**
 * Class IntEqualsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
class IntEqualsTest extends TestCase
{
    /** @test */
    public function int_equals()
    {
        $this->assertInstanceOf(BoolObject::class, Integer::equals(5, 5));
        $this->assertInstanceOf(BoolObject::class, Integer::equals(10, 5));

        $this->assertTrue(Integer::equals(5, 5)->value);
        $this->assertTrue(Integer::equals(5, 5.0)->value);
        $this->assertTrue(Integer::equals(-5, -5.0)->value);
        $this->assertFalse(Integer::equals(5, 5.5)->value);

        $this->assertFalse(Integer::equals(5, -5)->value);
        $this->assertFalse(Integer::equals(5, -5.0)->value);
        $this->assertFalse(Integer::equals(5, -5.5)->value);

        $this->assertFalse(Integer::equals(-5, 5)->value);
        $this->assertFalse(Integer::equals(-5, 5.0)->value);
        $this->assertFalse(Integer::equals(-5, 5.5)->value);
    }
}
