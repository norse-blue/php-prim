<?php

namespace NorseBlue\Prim\Tests\Extensions\Collections\Arr;

use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\Functions\arr;

class ArrContainsTest extends TestCase
{
    /** @test */
    public function arr_contains()
    {
        $arr = arr([1, 2, 3]);

        $this->assertTrue($arr->contains(2)->value);
        $this->assertFalse($arr->contains(5)->value);
    }
}
