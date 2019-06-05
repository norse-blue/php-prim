<?php

namespace NorseBlue\Prim\Tests\Types\Scalars;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\Functions\int;

class IntObjectTest extends TestCase
{
    /** @test */
    public function it_creates_a_default_int_object(): void
    {
        $int = new IntObject;
        $int_wrap = int($int);

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
        $int_wrap = int($int);
        $int_float = int(9.3);

        $this->assertEquals(9, $int->value);
        $this->assertEquals(9, $int_wrap->value);
        $this->assertEquals(9, $int_float->value);
        $this->assertNotSame($int, $int_wrap);
        $this->assertNotSame($int, $int_wrap->value);
        $this->assertNotSame($int->value, $int_wrap);
    }

    /** @test */
    public function it_throws_exception_if_int_value_not_valid(): void
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
