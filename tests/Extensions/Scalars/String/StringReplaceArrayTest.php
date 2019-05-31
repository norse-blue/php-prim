<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringReplaceArrayTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringReplaceArrayTest extends TestCase
{
    /** @test */
    public function string_replace_array()
    {
        $this->assertEquals('foo/bar/baz', Str::replaceArray('?/?/?', '?', ['foo', 'bar', 'baz'])->value);
        $this->assertEquals('foo/bar/baz/?', Str::replaceArray('?/?/?/?', '?', ['foo', 'bar', 'baz'])->value);
        $this->assertEquals('foo/bar', Str::replaceArray('?/?', '?', ['foo', 'bar', 'baz'])->value);
        $this->assertEquals('?/?/?', Str::replaceArray('?/?/?', 'x', ['foo', 'bar', 'baz'])->value);
    }
}
