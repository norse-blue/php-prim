<?php

namespace NorseBlue\Prim\Tests\Types\Scalars;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Exceptions\Scalars\String\StringUnsetOffsetException;
use NorseBlue\Prim\Types\Scalars\StringObject;
use NorseBlue\Prim\Tests\TestCase;
use OutOfBoundsException;
use function NorseBlue\Prim\Functions\string;

class StringObjectTest extends TestCase
{
    /** @test */
    public function it_creates_an_empty_string_object(): void
    {
        $str = new StringObject;
        $str_wrap = new StringObject($str);

        $this->assertEquals('', $str->value);
        $this->assertEquals('', $str_wrap->value);
        $this->assertNotSame($str, $str_wrap);
        $this->assertNotSame($str, $str_wrap->value);
        $this->assertNotSame($str->value, $str_wrap);
    }

    /** @test */
    public function it_creates_a_string_object_with_value(): void
    {
        $str = new StringObject('some value');
        $str_wrap = new StringObject($str);

        $this->assertEquals('some value', $str->value);
        $this->assertEquals('some value', $str_wrap->value);
        $this->assertNotSame($str, $str_wrap);
        $this->assertNotSame($str, $str_wrap->value);
        $this->assertNotSame($str->value, $str_wrap);
    }

    /** @test */
    public function it_throws_exception_if_string_value_not_valid(): void
    {
        try {
            new StringObject(3);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);
            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function string_object_has_array_access()
    {
        $empty_str = new StringObject;
        $str = string('my string');

        $this->assertFalse(isset($empty_str[0]));
        $this->assertTrue(isset($str[0]));

        $this->assertEquals('m', $str[0]);
        $this->assertEquals(' ', $str[2]);
        $this->assertEquals('i', $str[6]);
        $this->assertEquals('g', $str[8]);

        $str[2] = '_';
        $this->assertEquals('my_string', $str->value);

        $str[9] = '_appended';
        $this->assertEquals('my_string_', $str->value);
    }

    /** @test */
    public function string_object_throws_exception_when_accessing_non_existent_offset()
    {
        $str = string('my string');

        try {
            $str[10];
        } catch (Exception $e) {
            $this->assertInstanceOf(OutOfBoundsException::class, $e);
            return;
        }

        $this->fail(OutOfBoundsException::class . ' was not thrown');
    }

    /** @test */
    public function unset_string_offset_throws_exception()
    {
        $str = string('my string');

        try {
            unset($str[2]);
        } catch (Exception $e) {
            $this->assertInstanceOf(StringUnsetOffsetException::class, $e);
            return;
        }

        $this->fail(StringUnsetOffsetException::class . ' was not thrown');
    }
}
