<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Int;

use NorseBlue\Prim\Facades\Scalars\IntFacade as Integer;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\IntObject;

/**
 * Class IntAbsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Int
 */
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
