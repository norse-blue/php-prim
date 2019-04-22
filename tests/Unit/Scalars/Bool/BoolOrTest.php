<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Bool;

use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Tests\TestCase;

class BoolOrTest extends TestCase
{
    /** @test */
    public function it_applies_the_or_operation_to_bool_object()
    {
        $false = new BoolObject;
        $true = new BoolObject(true);

        $this->assertFalse($false->or(false)->value);
        $this->assertTrue($false->or(true)->value);
        $this->assertTrue($true->or(false)->value);
        $this->assertTrue($true->or(true)->value);

        $this->assertFalse($false->or(false, false, false)->value);
        $this->assertTrue($false->or(false, true, false)->value);
        $this->assertTrue($false->or(true, false, true)->value);
        $this->assertTrue($false->or(true, true, true)->value);

        $this->assertTrue($true->or(false, false, false)->value);
        $this->assertTrue($true->or(false, true, false)->value);
        $this->assertTrue($true->or(true, false, true)->value);
        $this->assertTrue($true->or(true, true, true)->value);

        $this->assertFalse($false->or([false, false, false])->value);
        $this->assertTrue($false->or([false, true, false])->value);
        $this->assertTrue($false->or([true, false, true])->value);
        $this->assertTrue($false->or([true, true, true])->value);

        $this->assertTrue($true->or([false, false, false])->value);
        $this->assertTrue($true->or([false, true, false])->value);
        $this->assertTrue($true->or([true, false, true])->value);
        $this->assertTrue($true->or([true, true, true])->value);
    }
}
