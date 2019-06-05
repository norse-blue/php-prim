<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringStartTest extends TestCase
{
    /** @test */
    public function string_start()
    {
        $this->assertEquals('/test/string', Str::start('test/string', '/')->value);
        $this->assertEquals('/test/string', Str::start('/test/string', '/')->value);
        $this->assertEquals('/test/string', Str::start('//test/string', '/')->value);
    }
}
