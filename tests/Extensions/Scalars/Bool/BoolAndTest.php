<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Bool;

use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\BoolObject;

/**
 * Class BoolAndTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Bool
 */
class BoolAndTest extends TestCase
{
    /** @test */
    public function it_applies_the_and_operation_to_bool_object()
    {
        $false = new BoolObject();
        $true = new BoolObject(true);

        $this->assertFalse($false->and(false)->value);
        $this->assertFalse($false->and(true)->value);
        $this->assertFalse($true->and(false)->value);
        $this->assertTrue($true->and(true)->value);

        $this->assertFalse($false->and(false, false, false)->value);
        $this->assertFalse($false->and(false, true, false)->value);
        $this->assertFalse($false->and(true, false, true)->value);
        $this->assertFalse($false->and(true, true, true)->value);

        $this->assertFalse($true->and(false, false, false)->value);
        $this->assertFalse($true->and(false, true, false)->value);
        $this->assertFalse($true->and(true, false, true)->value);
        $this->assertTrue($true->and(true, true, true)->value);

        $this->assertFalse($false->and([false, true, false])->value);
        $this->assertFalse($false->and([false, false, false])->value);
        $this->assertFalse($false->and([true, false, true])->value);
        $this->assertFalse($false->and([true, true, true])->value);

        $this->assertFalse($true->and([false, false, false])->value);
        $this->assertFalse($true->and([false, true, false])->value);
        $this->assertFalse($true->and([true, false, true])->value);
        $this->assertTrue($true->and([true, true, true])->value);
    }
}