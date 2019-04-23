<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;

class IntEqualsTest extends TestCase
{
    /** @test */
    public function int_equals()
    {
        $this->assertTrue(Integer::equals(5, 5)->value);
        $this->assertTrue(Integer::equals(5, 5.0)->value);
        $this->assertTrue(Integer::equals(5, 5.5)->value);

        $this->assertFalse(Integer::equals(5, -5)->value);
        $this->assertFalse(Integer::equals(5, -5.0)->value);
        $this->assertFalse(Integer::equals(5, -5.5)->value);

        $this->assertFalse(Integer::equals(-5, 5)->value);
        $this->assertFalse(Integer::equals(-5, 5.0)->value);
        $this->assertFalse(Integer::equals(-5, 5.5)->value);
    }
}
