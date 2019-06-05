<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringExplodeTest extends TestCase
{
    /** @test */
    public function string_explode()
    {
        $this->assertEquals(['foo', 'bar', 'foo'], Str::explode('foo bar foo', ' '));
        $this->assertEquals(['foo', 'bar'], Str::explode('foo bar foo', ' ', -1));
    }
}
