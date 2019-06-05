<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringPadLeftTest extends TestCase
{
    /** @test */
    public function string_pad_left()
    {
        $this->assertEquals('abc', Str::padLeft('abc', 1)->value);
        $this->assertEquals('abc', Str::padLeft('abc', 1, '_')->value);
        $this->assertEquals('abc', Str::padLeft('abc', 3)->value);
        $this->assertEquals('abc', Str::padLeft('abc', 3, '_')->value);
        $this->assertEquals(' abc', Str::padLeft('abc', 4)->value);
        $this->assertEquals('_abc', Str::padLeft('abc', 4, '_')->value);
        $this->assertEquals('  abc', Str::padLeft('abc', 5)->value);
        $this->assertEquals('__abc', Str::padLeft('abc', 5, '_')->value);
        $this->assertEquals('    abc', Str::padLeft('abc', 7)->value);
        $this->assertEquals('____abc', Str::padLeft('abc', 7, '_')->value);
    }
}
