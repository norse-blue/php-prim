<?php

namespace NorseBlue\Prim\Tests\Unit;

use Exception;
use NorseBlue\Prim\Exceptions\PropertyNotFoundException;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\ValueObject;

/**
 * Class ValueObjectTest
 *
 * @package NorseBlue\Prim\Tests\Unit
 */
class ValueObjectTest extends TestCase
{
    /** @test */
    public function can_create_a_value_object(): void
    {
        $obj = new ValueObject(3);
        $obj_value = new ValueObject($obj);

        $this->assertEquals(3, $obj->value);
        $this->assertEquals(3, $obj_value->value);
        $this->assertNotSame($obj, $obj_value);
    }

    /** @test */
    public function can_set_the_value(): void
    {
        $obj = new ValueObject;
        $this->assertNull($obj->value);
        $this->assertFalse(isset($obj->object_value));    // Verifying the property by actual name
        $this->assertFalse(isset($obj->value));

        $obj->value = 3;
        $this->assertEquals(3, $obj->value);
        $this->assertTrue(isset($obj->object_value));     // Verifying the property by actual name
        $this->assertTrue(isset($obj->value));
    }

    /** @test */
    public function it_throws_exception_when_getting_a_nonexistent_property(): void
    {
        $obj = new ValueObject;

        try {
            $nonexistent = $obj->nonexistent;
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotFoundException::class, $e);
            return;
        }

        $this->fail(PropertyNotFoundException::class . ' was not thrown.');
    }

    /** @test */
    public function it_throws_exception_when_setting_a_nonexistent_property(): void
    {
        $obj = new ValueObject;

        try {
            $obj->nonexistent = 3;
        } catch (Exception $e) {
            $this->assertInstanceOf(PropertyNotFoundException::class, $e);
            return;
        }

        $this->fail(PropertyNotFoundException::class . ' was not thrown.');
    }
}
