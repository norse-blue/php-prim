<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringSlugTest extends TestCase
{
    /** @test */
    public function string_slug()
    {
        $this->assertEquals('hello-world', Str::slug('hello world')->value);
        $this->assertEquals('hello-world', Str::slug('hello-world')->value);
        $this->assertEquals('hello-world', Str::slug('hello_world')->value);
        $this->assertEquals('hello_world', Str::slug('hello_world', '_')->value);
        $this->assertEquals('user-at-host', Str::slug('user@host')->value);
        $this->assertEquals('سلام-دنیا', Str::slug('سلام دنیا', '-', null)->value);
    }
}
