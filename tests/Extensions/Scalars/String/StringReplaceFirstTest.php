<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringReplaceFirstTest extends TestCase
{
    /** @test */
    public function string_replace_first()
    {
        $this->assertEquals('fooqux foobar', Str::replaceFirst('foobar foobar', 'bar', 'qux')->value);
        $this->assertEquals('foo/qux? foo/bar?', Str::replaceFirst('foo/bar? foo/bar?', 'bar?', 'qux?')->value);
        $this->assertEquals('foo foobar', Str::replaceFirst('foobar foobar', 'bar', '')->value);
        $this->assertEquals('foobar foobar', Str::replaceFirst('foobar foobar', 'xxx', 'yyy')->value);
        $this->assertEquals('foobar foobar', Str::replaceFirst('foobar foobar', '', 'yyy')->value);

        // Test for multibyte string support
        $this->assertEquals('Jxxxnköping Malmö', Str::replaceFirst('Jönköping Malmö', 'ö', 'xxx')->value);
        $this->assertEquals('Jönköping Malmö', Str::replaceFirst('Jönköping Malmö', '', 'yyy')->value);
    }
}
