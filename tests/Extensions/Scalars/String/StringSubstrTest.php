<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringSubstrTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringSubstrTest extends TestCase
{
    /** @test */
    public function string_substr()
    {
        $this->assertEquals('Ё', Str::substr('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('ЛЁ', Str::substr('БГДЖИЛЁ', -2)->value);
        $this->assertEquals('И', Str::substr('БГДЖИЛЁ', -3, 1)->value);
        $this->assertEquals('ДЖИЛ', Str::substr('БГДЖИЛЁ', 2, -1)->value);
        $this->assertEmpty(Str::substr('БГДЖИЛЁ', 4, -4)->value);
        $this->assertEquals('ИЛ', Str::substr('БГДЖИЛЁ', -3, -1)->value);
        $this->assertEquals('ГДЖИЛЁ', Str::substr('БГДЖИЛЁ', 1)->value);
        $this->assertEquals('ГДЖ', Str::substr('БГДЖИЛЁ', 1, 3)->value);
        $this->assertEquals('БГДЖ', Str::substr('БГДЖИЛЁ', 0, 4)->value);
        $this->assertEquals('Ё', Str::substr('БГДЖИЛЁ', -1, 1)->value);
        $this->assertEmpty(Str::substr('Б', 2)->value);
    }
}
