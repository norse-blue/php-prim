<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Bool;

use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\BoolObject;

class BoolAndTest extends TestCase
{
    /** @test */
    public function bool_and()
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
