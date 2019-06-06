<?php

namespace NorseBlue\Prim\Tests\Types\Enums;

use Exception;
use NorseBlue\Prim\Exceptions\Enums\InvalidEnumValueException;
use NorseBlue\Prim\Exceptions\ImmutablePropertyException;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Tests\Helpers\Enums\OptionsEnum;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class EnumTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Enums
 */
class EnumTest extends TestCase
{
    /** @test */
    public function can_create_enum()
    {
        $this->assertInstanceOf(OptionsEnum::class, OptionsEnum::FIRST_OPTION());
        $this->assertEquals(1, OptionsEnum::FIRST_OPTION()->value);

        $this->assertInstanceOf(OptionsEnum::class, OptionsEnum::create(3));
        $this->assertEquals(3, OptionsEnum::create(3)->value);

        $this->assertInstanceOf(OptionsEnum::class, OptionsEnum::create(OptionsEnum::FIFTH_OPTION()));
        $this->assertEquals(5, OptionsEnum::create(OptionsEnum::FIFTH_OPTION())->value);
    }

    /** @test */
    public function cannot_create_enum_with_not_declared_value()
    {
        try {
            OptionsEnum::create(9);
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }

    /** @test */
    public function empty_enum_value_is_empty()
    {
        $this->assertTrue(OptionsEnum::EMPTY()->isEmpty());
    }

    /** @test */
    public function null_enum_value_is_null()
    {
        $this->assertTrue(OptionsEnum::NONE()->isNull());
    }

    /** @test */
    public function zero_enum_value_is_zero()
    {
        $this->assertTrue(OptionsEnum::ZERO()->isZero());
    }

    /** @test */
    public function enum_keys_has_all_enum_keys()
    {
        $keys = OptionsEnum::keys();

        $this->assertEquals(
            [
                'EMPTY',
                'NONE',
                'ZERO',
                'FIRST_OPTION',
                'SECOND_OPTION',
                'THIRD_OPTION',
                'FOURTH_OPTION',
                'FIFTH_OPTION',
            ],
            $keys->all()
        );
    }

    /** @test */
    public function enum_values_has_all_enum_values()
    {
        $values = OptionsEnum::values();

        $this->assertEquals(
            [
                '',
                null,
                0,
                1,
                2,
                3,
                4,
                5,
            ],
            $values->all()
        );
    }

    /** @test */
    public function enum_can_get_key()
    {
        $enum = OptionsEnum::NONE();

        $this->assertEquals('NONE', $enum->key->value);
    }

    /** @test */
    public function enum_cannot_set_key()
    {
        $enum = OptionsEnum::NONE();

        try {
            $enum->key = 'ZERO';
        } catch (Exception $e) {
            $this->assertInstanceOf(ImmutablePropertyException::class, $e);

            return;
        }

        $this->fail(ImmutablePropertyException::class . ' was not thrown.');
    }

    /** @test */
    public function throws_Exception_when_enum_has_not_value()
    {
        try {
            OptionsEnum::UNKNOWN();
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidEnumValueException::class, $e);

            return;
        }

        $this->fail(InvalidEnumValueException::class . ' was not thrown.');
    }
}
