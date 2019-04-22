<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Bool;

use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Tests\TestCase;

class BoolAndTest extends TestCase
{
    /** @test */
    public function it_applies_the_and_operation_to_bool_object()
    {
        $false = new BoolObject;
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
