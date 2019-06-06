<?php

namespace NorseBlue\Prim\Tests\Extensions\Enums;

use NorseBlue\Prim\Tests\Helpers\Enums\OptionsEnum;
use NorseBlue\Prim\Tests\Helpers\Enums\OtherEnum;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class EnumEqualsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Enums\Extensions
 */
class EnumEqualsTest extends TestCase
{
    /** @test */
    public function enum_equals()
    {
        $enum = OptionsEnum::THIRD_OPTION();

        $this->assertTrue($enum->equals(OptionsEnum::THIRD_OPTION())->value);
        $this->assertTrue($enum->equals(3)->value);
        $this->assertFalse($enum->equals(OtherEnum::THIRD_OPTION())->value);
        $this->assertFalse($enum->equals(OptionsEnum::FIRST_OPTION())->value);
        $this->assertFalse($enum->equals(1)->value);
    }

    /** @test */
    public function enum_equals_null()
    {
        $enum = OptionsEnum::NONE();

        $this->assertTrue($enum->equals(null)->value);
        $this->assertFalse($enum->equals('')->value);
        $this->assertFalse($enum->equals('other_value')->value);
    }

    /** @test */
    public function enum_equals_empty()
    {
        $enum = OptionsEnum::EMPTY();

        $this->assertTrue($enum->equals('')->value);
        $this->assertFalse($enum->equals('other_value')->value);
        $this->assertFalse($enum->equals(null)->value);
    }
}
