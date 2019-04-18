<?php

namespace NorseBlue\Prim\Tests\Unit;

use Exception;
use NorseBlue\Prim\Exceptions\ImmutableValueException;
use NorseBlue\Prim\Exceptions\PropertyNotFoundException;
use NorseBlue\Prim\ImmutableValueObject;
use NorseBlue\Prim\Tests\_Helpers_\ImmutableDummy;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class ImmutableObjectTest
 *
 * @package NorseBlue\Prim\Tests\Unit
 */
class ImmutableObjectTest extends TestCase
{
    /** @test */
    public function immutable_value_object_throws_exception_when_setting_the_value(): void
    {
        $obj = new ImmutableValueObject;

        try {
            $obj->value = 'new value';
        } catch (Exception $e) {
            $this->assertInstanceOf(ImmutableValueException::class, $e);
            return;
        }

        $this->fail(PropertyNotFoundException::class . ' was not thrown.');
    }

    /** @test */
    public function immutable_value_object_can_set_mutable_properties(): void
    {
        $obj = new ImmutableDummy(3);
        $this->assertEquals(3, $obj->value);
        $this->assertNull($obj->mutable);

        $obj->mutable = $obj->value;

        $this->assertEquals(3, $obj->value);
        $this->assertEquals(3, $obj->mutable);
    }
}
