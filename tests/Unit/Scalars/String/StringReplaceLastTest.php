<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringReplaceLastTest extends TestCase
{
    /** @test */
    public function string_replace_last()
    {
        $this->assertEquals('foobar fooqux', Str::replaceLast('foobar foobar', 'bar', 'qux'));
        $this->assertEquals('foo/bar? foo/qux?', Str::replaceLast('foo/bar? foo/bar?', 'bar?', 'qux?'));
        $this->assertEquals('foobar foo', Str::replaceLast('foobar foobar', 'bar', ''));
        $this->assertEquals('foobar foobar', Str::replaceLast('foobar foobar', 'xxx', 'yyy'));
        $this->assertEquals('foobar foobar', Str::replaceLast('foobar foobar', '', 'yyy'));
        
        // Test for multibyte string support
        $this->assertEquals('Malmö Jönkxxxping', Str::replaceLast('Malmö Jönköping', 'ö', 'xxx'));
        $this->assertEquals('Malmö Jönköping', Str::replaceLast('Malmö Jönköping', '', 'yyy'));
    }
}
