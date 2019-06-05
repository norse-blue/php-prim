<?php

namespace NorseBlue\Prim\Tests\Types;

use Exception;
use NorseBlue\Prim\Exceptions\ImmutablePropertyException;
use NorseBlue\Prim\Tests\Helpers\ImmutableDummy;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\ImmutableValueObject;

class ImmutableValueObjectTest extends TestCase
{
    /** @test */
    public function immutable_value_object_throws_exception_when_setting_the_value(): void
    {
        $obj = new ImmutableValueObject();

        try {
            $obj->value = 'new value';
        } catch (Exception $e) {
            $this->assertInstanceOf(ImmutablePropertyException::class, $e);
            $this->assertEquals('value', $e->getProperty());

            return;
        }

        $this->fail(ImmutablePropertyException::class . ' was not thrown.');
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
