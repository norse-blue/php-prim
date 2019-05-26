<?php

namespace NorseBlue\Prim\Tests\Unit\Collections\Arr;

use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\arr;

/**
 * Class ArrContainsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Collections\Arr
 */
class ArrContainsTest extends TestCase
{
    /** @test */
    public function arr_object_contains()
    {
        $arr = arr([1, 2, 3]);

        $this->assertTrue($arr->contains(2)->value);
        $this->assertFalse($arr->contains(5)->value);
    }
}
