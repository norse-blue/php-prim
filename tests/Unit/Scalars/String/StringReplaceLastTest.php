<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringReplaceLastTest extends TestCase
{
    /** @test */
    public function string_replace_last()
    {
        $this->assertEquals('foobar fooqux', Str::replaceLast('foobar foobar', 'bar', 'qux')->value);
        $this->assertEquals('foo/bar? foo/qux?', Str::replaceLast('foo/bar? foo/bar?', 'bar?', 'qux?')->value);
        $this->assertEquals('foobar foo', Str::replaceLast('foobar foobar', 'bar', '')->value);
        $this->assertEquals('foobar foobar', Str::replaceLast('foobar foobar', 'xxx', 'yyy')->value);
        $this->assertEquals('foobar foobar', Str::replaceLast('foobar foobar', '', 'yyy')->value);
        
        // Test for multibyte string support
        $this->assertEquals('Malmö Jönkxxxping', Str::replaceLast('Malmö Jönköping', 'ö', 'xxx')->value);
        $this->assertEquals('Malmö Jönköping', Str::replaceLast('Malmö Jönköping', '', 'yyy')->value);
    }
}
