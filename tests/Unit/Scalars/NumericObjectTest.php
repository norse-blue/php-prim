<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Scalars\NumericObject;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class NumericObjectTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars
 */
class NumericObjectTest extends TestCase
{
    /** @test */
    public function it_creates_a_default_numeric_object(): void
    {
        $numeric = new NumericObject;
        $numeric_wrap = new NumericObject($numeric);

        $this->assertEquals(0, $numeric->value);
        $this->assertEquals(0, $numeric_wrap->value);
        $this->assertNotSame($numeric, $numeric_wrap);
        $this->assertNotSame($numeric, $numeric_wrap->value);
        $this->assertNotSame($numeric->value, $numeric_wrap);
    }

    /** @test */
    public function it_creates_a_numeric_object_with_int_value(): void
    {
        $numeric = new NumericObject(9);
        $numeric_wrap = new NumericObject($numeric);

        $this->assertFalse($numeric->isFloat()->value);
        $this->assertTrue($numeric->isInt()->value);
        $this->assertEquals(9, $numeric->value);
        $this->assertEquals(9, $numeric_wrap->value);
        $this->assertNotSame($numeric, $numeric_wrap);
        $this->assertNotSame($numeric, $numeric_wrap->value);
        $this->assertNotSame($numeric->value, $numeric_wrap);
    }

    /** @test */
    public function it_creates_a_numeric_object_with_float_value(): void
    {
        $numeric = new NumericObject(9.3);
        $numeric_wrap = new NumericObject($numeric);

        $this->assertTrue($numeric->isFloat()->value);
        $this->assertFalse($numeric->isInt()->value);
        $this->assertEquals(9.3, $numeric->value);
        $this->assertEquals(9.3, $numeric_wrap->value);
        $this->assertNotSame($numeric, $numeric_wrap);
        $this->assertNotSame($numeric, $numeric_wrap->value);
        $this->assertNotSame($numeric->value, $numeric_wrap);
    }

    /** @test */
    public function it_throws_exception_if_numeric_value_not_valid(): void
    {
        try {
            new NumericObject('value');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);
            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}
