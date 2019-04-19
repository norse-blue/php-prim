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
        $this->assertTrue(Str::is('/', '/'));
        $this->assertFalse(Str::is('/', ' /'));
        $this->assertFalse(Str::is('/a', '/'));
        $this->assertTrue(Str::is('foo/bar/baz', 'foo/*'));

        $this->assertTrue(Str::is('App\Class@method', '*@*'));
        $this->assertTrue(Str::is('app\Class@', '*@*'));
        $this->assertTrue(Str::is('@method', '*@*'));

        // is case sensitive
        $this->assertFalse(Str::is('foo/bar/baz', '*BAZ*'));
        $this->assertFalse(Str::is('foo/bar/baz', '*FOO*'));
        $this->assertFalse(Str::is('a', 'A'));

        // Accepts array of patterns
        $this->assertTrue(Str::is('a/', ['a*', 'b*']));
        $this->assertTrue(Str::is('b/', ['a*', 'b*']));
        $this->assertFalse(Str::is('f/', ['a*', 'b*']));

        $this->assertTrue(Str::is('blah/baz/foo', '*/foo'));

        $valueObject = new StringObject('foo/bar/baz');
        $patternObject = new StringObject('foo/*');

        $this->assertTrue(Str::is($valueObject, 'foo/bar/baz'));
        $this->assertTrue(Str::is($valueObject, $patternObject));

        //empty patterns
        $this->assertFalse(Str::is('test', []));
    }
}
