<?php

namespace NorseBlue\Prim\Tests\Extensions\Enums;

use NorseBlue\Prim\Tests\Helpers\Enums\OptionsEnum;
use NorseBlue\Prim\Tests\Helpers\Enums\OtherEnum;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class EnumSameTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Enums\Extensions
 */
class EnumSameTest extends TestCase
{
    /** @test */
    public function enum_same()
    {
        $enum = OptionsEnum::THIRD_OPTION();

        $this->assertTrue($enum->same(OptionsEnum::THIRD_OPTION())->value);
        $this->assertFalse($enum->same(OtherEnum::THIRD_OPTION())->value);
    }
}
