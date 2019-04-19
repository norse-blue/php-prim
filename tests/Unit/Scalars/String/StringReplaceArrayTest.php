<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringReplaceArrayTest extends TestCase
{
    /** @test */
    public function string_replace_array()
    {
        $this->assertEquals('foo/bar/baz', Str::replaceArray('?/?/?', '?', ['foo', 'bar', 'baz']));
        $this->assertEquals('foo/bar/baz/?', Str::replaceArray('?/?/?/?', '?', ['foo', 'bar', 'baz']));
        $this->assertEquals('foo/bar', Str::replaceArray('?/?', '?', ['foo', 'bar', 'baz']));
        $this->assertEquals('?/?/?', Str::replaceArray('?/?/?', 'x', ['foo', 'bar', 'baz']));
    }
}
