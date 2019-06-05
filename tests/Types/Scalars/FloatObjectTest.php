<?php

namespace NorseBlue\Prim\Tests\Types\Scalars;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Types\Scalars\FloatObject;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\Functions\float;

class FloatObjectTest extends TestCase
{
    /** @test */
    public function it_creates_a_default_float_object(): void
    {
        $float = new FloatObject;
        $float_wrap = float($float);

        $this->assertEquals(0.0, $float->value);
        $this->assertEquals(0.0, $float_wrap->value);
        $this->assertNotSame($float, $float_wrap);
        $this->assertNotSame($float, $float_wrap->value);
        $this->assertNotSame($float->value, $float_wrap);
    }

    /** @test */
    public function it_creates_a_float_object_with_value(): void
    {
        $float = float(9.3);
        $float_wrap = float($float);
        $float_int = float(9);

        $this->assertEquals(9.3, $float->value);
        $this->assertEquals(9.3, $float_wrap->value);
        $this->assertEquals(9.0, $float_int->value);
        $this->assertNotSame($float, $float_wrap);
        $this->assertNotSame($float, $float_wrap->value);
        $this->assertNotSame($float->value, $float_wrap);
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
