<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Bool;

use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Tests\TestCase;

class BoolNotTest extends TestCase
{
    /** @test */
    public function it_applies_the_not_operation_to_bool_object()
    {
        $false = new BoolObject;

        $true = $false->not();

        $this->assertFalse($false->value);
        $this->assertTrue($true->value);
        $this->assertNotSame($false, $true);
    }
}
