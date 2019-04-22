<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Bool;

use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Tests\TestCase;

class BoolXorTest extends TestCase
{
    /** @test */
    public function it_applies_the_or_operation_to_bool_object()
    {
        $false = new BoolObject;
        $true = new BoolObject(true);

        $this->assertFalse($false->xor(false)->value);
        $this->assertTrue($false->xor(true)->value);
        $this->assertTrue($true->xor(false)->value);
        $this->assertFalse($true->xor(true)->value);

        $this->assertFalse($false->xor(false, false, false)->value);
        $this->assertTrue($false->xor(false, true, false)->value);
        $this->assertFalse($false->xor(true, false, true)->value);
        $this->assertTrue($false->xor(true, true, true)->value);

        $this->assertTrue($true->xor(false, false, false)->value);
        $this->assertFalse($true->xor(false, true, false)->value);
        $this->assertTrue($true->xor(true, false, true)->value);
        $this->assertFalse($true->xor(true, true, true)->value);

        $this->assertFalse($false->xor([false, false, false])->value);
        $this->assertTrue($false->xor([false, true, false])->value);
        $this->assertFalse($false->xor([true, false, true])->value);
        $this->assertTrue($false->xor([true, true, true])->value);

        $this->assertTrue($true->xor([false, false, false])->value);
        $this->assertFalse($true->xor([false, true, false])->value);
        $this->assertTrue($true->xor([true, false, true])->value);
        $this->assertFalse($true->xor([true, true, true])->value);
    }
}
