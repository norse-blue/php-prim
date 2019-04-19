<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Scalars\StringObject;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringObjectTest
 *
 * @package NorseBlue\Prim\Tests\Unit
 */
class StringObjectTest extends TestCase
{
    /** @test */
    public function it_creates_an_empty_string_object(): void
    {
        $str = new StringObject;
        $str_wrap = new StringObject($str);

        $this->assertEquals('', $str);
        $this->assertEquals('', $str_wrap);
        $this->assertNotSame($str, $str_wrap);
        $this->assertNotSame($str, $str_wrap->value);
    }

    /** @test */
    public function it_creates_a_string_object_with_value(): void
    {
        $str = new StringObject('some value');
        $str_wrap = new StringObject($str);

        $this->assertEquals('some value', $str);
        $this->assertEquals('some value', $str_wrap);
        $this->assertNotSame($str, $str_wrap);
        $this->assertNotSame($str, $str_wrap->value);
    }

    /** @test */
    public function it_throws_exception_if_value_not_valid(): void
    {
        try {
            new StringObject(3);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);
            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}
