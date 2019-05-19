<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringToggleTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringToggleTest extends TestCase
{
    /** @test */
    public function string_toggle()
    {
        $this->assertEquals('one', Str::toggle('', ['one', 'two', 'three'])->value);
        $this->assertEquals('', Str::toggle('', ['one', 'two', 'three'], true)->value);
        $this->assertEquals('two', Str::toggle('one', ['one', 'two', 'three'], true)->value);
        $this->assertEquals('two', Str::toggle('one', ['one', 'two', 'three'])->value);
        $this->assertEquals('three', Str::toggle('two', ['one', 'two', 'three'])->value);
        $this->assertEquals('one', Str::toggle('three', ['one', 'two', 'three'])->value);
    }
}
