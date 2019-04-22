<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Tests\TestCase;

class FloatObjectTest extends TestCase
{
    /** @test */
    public function it_creates_a_default_float_object(): void
    {
        $float = new FloatObject;
        $float_wrap = new FloatObject($float);

        $this->assertEquals(0.0, $float->value);
        $this->assertEquals(0.0, $float_wrap->value);
        $this->assertNotSame($float, $float_wrap);
        $this->assertNotSame($float, $float_wrap->value);
        $this->assertNotSame($float->value, $float_wrap);
    }

    /** @test */
    public function it_creates_a_float_object_with_value(): void
    {
        $int = new FloatObject(9.3);
        $int_wrap = new FloatObject($int);

        $this->assertEquals(9.3, $int->value);
        $this->assertEquals(9.3, $int_wrap->value);
        $this->assertNotSame($int, $int_wrap);
        $this->assertNotSame($int, $int_wrap->value);
        $this->assertNotSame($int->value, $int_wrap);
    }

    /** @test */
    public function it_throws_exception_if_float_value_not_valid(): void
    {
        try {
            new FloatObject('value');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);
            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}
