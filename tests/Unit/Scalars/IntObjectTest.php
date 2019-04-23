<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Tests\TestCase;

class IntObjectTest extends TestCase
{
    /** @test */
    public function it_creates_a_default_int_object(): void
    {
        $int = new IntObject;
        $int_wrap = new IntObject($int);

        $this->assertEquals(0, $int->value);
        $this->assertEquals(0, $int_wrap->value);
        $this->assertNotSame($int, $int_wrap);
        $this->assertNotSame($int, $int_wrap->value);
        $this->assertNotSame($int->value, $int_wrap);
    }

    /** @test */
    public function it_creates_a_int_object_with_value(): void
    {
        $int = new IntObject(9);
        $int_wrap = new IntObject($int);
        $int_float = new IntObject((int)9.3);

        $this->assertEquals(9, $int->value);
        $this->assertEquals(9, $int_wrap->value);
        $this->assertEquals(9, $int_float->value);
        $this->assertNotSame($int, $int_wrap);
        $this->assertNotSame($int, $int_wrap->value);
        $this->assertNotSame($int->value, $int_wrap);
    }

    /** @test */
    public function it_throws_exception_if_int_value_not_valid_float(): void
    {
        try {
            new IntObject(9.3);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);
            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function it_throws_exception_if_int_value_not_valid_string(): void
    {
        try {
            new IntObject('value');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);
            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}
