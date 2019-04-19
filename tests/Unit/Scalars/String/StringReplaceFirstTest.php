<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringReplaceFirstTest extends TestCase
{
    /** @test */
    public function string_replace_first()
    {
        $this->assertEquals('fooqux foobar', Str::replaceFirst('foobar foobar', 'bar', 'qux'));
        $this->assertEquals('foo/qux? foo/bar?', Str::replaceFirst('foo/bar? foo/bar?', 'bar?', 'qux?'));
        $this->assertEquals('foo foobar', Str::replaceFirst('foobar foobar', 'bar', ''));
        $this->assertEquals('foobar foobar', Str::replaceFirst('foobar foobar', 'xxx', 'yyy'));
        $this->assertEquals('foobar foobar', Str::replaceFirst('foobar foobar', '', 'yyy'));

        // Test for multibyte string support
        $this->assertEquals('Jxxxnköping Malmö', Str::replaceFirst('Jönköping Malmö', 'ö', 'xxx'));
        $this->assertEquals('Jönköping Malmö', Str::replaceFirst('Jönköping Malmö', '', 'yyy'));
    }
}
