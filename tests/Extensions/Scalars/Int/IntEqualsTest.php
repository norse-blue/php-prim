<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\BoolObject;

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
