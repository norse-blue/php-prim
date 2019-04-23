<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Scalars\StringObject;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringIsTest extends TestCase
{
    /** @test */
    public function string_is()
    {
        $this->assertTrue(Str::is('/', '/')->value);
        $this->assertFalse(Str::is('/', ' /')->value);
        $this->assertFalse(Str::is('/a', '/')->value);
        $this->assertTrue(Str::is('foo/bar/baz', 'foo/*')->value);

        $this->assertTrue(Str::is('App\Class@method', '*@*')->value);
        $this->assertTrue(Str::is('app\Class@', '*@*')->value);
        $this->assertTrue(Str::is('@method', '*@*')->value);

        // is case sensitive
        $this->assertFalse(Str::is('foo/bar/baz', '*BAZ*')->value);
        $this->assertFalse(Str::is('foo/bar/baz', '*FOO*')->value);
        $this->assertFalse(Str::is('a', 'A')->value);

        // Accepts array of patterns
        $this->assertTrue(Str::is('a/', ['a*', 'b*'])->value);
        $this->assertTrue(Str::is('b/', ['a*', 'b*'])->value);
        $this->assertFalse(Str::is('f/', ['a*', 'b*'])->value);

        $this->assertTrue(Str::is('blah/baz/foo', '*/foo')->value);

        $valueObject = new StringObject('foo/bar/baz');
        $patternObject = new StringObject('foo/*');

        $this->assertTrue(Str::is($valueObject, 'foo/bar/baz')->value);
        $this->assertTrue(Str::is($valueObject, $patternObject)->value);

        //empty patterns
        $this->assertFalse(Str::is('test', [])->value);
    }
}
