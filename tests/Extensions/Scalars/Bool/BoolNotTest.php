<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Bool;

use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\BoolObject;

class BoolNotTest extends TestCase
{
    /** @test */
    public function bool_not()
    {
        $false = new BoolObject;

        $true = $false->not();

        $this->assertFalse($false->value);
        $this->assertTrue($true->value);
        $this->assertNotSame($false, $true);
    }
}
