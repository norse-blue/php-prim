<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\Bool;

use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\BoolObject;

/**
 * Class BoolNotTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Bool
 */
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
