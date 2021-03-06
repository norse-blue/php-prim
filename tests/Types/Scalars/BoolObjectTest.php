<?php

namespace NorseBlue\Prim\Tests\Types\Scalars;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Tests\TestCase;

class BoolObjectTest extends TestCase
{
    /** @test */
    public function it_creates_a_default_bool_object(): void
    {
        $bool = new BoolObject();
        $bool_wrap = BoolObject::create($bool);

        $this->assertFalse($bool->value);
        $this->assertFalse($bool_wrap->value);
        $this->assertTrue($bool->isFalse());
        $this->assertTrue($bool_wrap->isFalse());
        $this->assertNotSame($bool, $bool_wrap);
        $this->assertNotSame($bool, $bool_wrap->value);
        $this->assertNotSame($bool->value, $bool_wrap);
    }

    /** @test */
    public function it_creates_a_bool_object_with_value(): void
    {
        $bool = new BoolObject(true);
        $bool_wrap = new BoolObject($bool);

        $this->assertTrue($bool->value);
        $this->assertTrue($bool_wrap->value);
        $this->assertTrue($bool->isTrue());
        $this->assertTrue($bool_wrap->isTrue());
        $this->assertNotSame($bool, $bool_wrap);
        $this->assertNotSame($bool, $bool_wrap->value);
        $this->assertNotSame($bool->value, $bool_wrap);
    }

    /** @test */
    public function it_throws_exception_if_bool_value_not_valid(): void
    {
        try {
            new BoolObject(3);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);
            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}
