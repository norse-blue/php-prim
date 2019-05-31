<?php

namespace NorseBlue\Prim\Tests\Types\Collections\Arr;

use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Collections\ArrObject;

/**
 * Class ArrEachTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Collections\Arr
 */
class ArrEachTest extends TestCase
{
    /** @test */
    public function arr_each()
    {
        $arr = new ArrObject($original = [1, 2, 'foo' => 'bar', 'bam' => 'baz']);

        $result = [];
        $arr_result = $arr->each(function ($item, $key) use (&$result) {
            $result[$key] = $item;
        });
        $this->assertEquals($original, $result);
        $this->assertInstanceOf(ArrObject::class, $arr_result);
        $this->assertSame($arr, $arr_result);

        $result = [];
        $arr_result = $arr->each(function ($item, $key) use (&$result) {
            $result[$key] = $item;
            if (is_string($key)) {
                return false;
            }
        });
        $this->assertEquals([1, 2, 'foo' => 'bar'], $result);
        $this->assertInstanceOf(ArrObject::class, $arr_result);
        $this->assertSame($arr, $arr_result);
    }
}
