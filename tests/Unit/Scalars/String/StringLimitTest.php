<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringLimitTest extends TestCase
{
    /** @test */
    public function string_limit()
    {
        $this->assertEquals(
            'Laravel is...',
            Str::limit('Laravel is a free, open source PHP web application framework.', 10)->value
        );
        $this->assertEquals('这是一...', Str::limit('这是一段中文', 6)->value);

        $string = 'The PHP framework for web artisans.';
        $this->assertEquals('The PHP...', Str::limit($string, 7)->value);
        $this->assertEquals('The PHP', Str::limit($string, 7, '')->value);
        $this->assertEquals('The PHP framework for web artisans.', Str::limit($string, 100)->value);

        $nonAsciiString = '这是一段中文';
        $this->assertEquals('这是一...', Str::limit($nonAsciiString, 6)->value);
        $this->assertEquals('这是一', Str::limit($nonAsciiString, 6, '')->value);
    }
}
