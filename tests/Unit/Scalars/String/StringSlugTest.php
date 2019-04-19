<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringSlugTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringSlugTest extends TestCase
{
    /** @test */
    public function string_slug()
    {
        $this->assertEquals('hello-world', Str::slug('hello world'));
        $this->assertEquals('hello-world', Str::slug('hello-world'));
        $this->assertEquals('hello-world', Str::slug('hello_world'));
        $this->assertEquals('hello_world', Str::slug('hello_world', '_'));
        $this->assertEquals('user-at-host', Str::slug('user@host'));
        $this->assertEquals('سلام-دنیا', Str::slug('سلام دنیا', '-', null));
    }
}
