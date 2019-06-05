<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\IntObject;

class IntAbsTest extends TestCase
{
    /** @test */
    public function int_abs()
    {
        $this->assertInstanceOf(IntObject::class, Integer::abs(9));
        $this->assertInstanceOf(IntObject::class, Integer::abs(9.3));
        $this->assertEquals(9, Integer::abs(9)->value);
        $this->assertEquals(9, Integer::abs(-9)->value);
    }
}
