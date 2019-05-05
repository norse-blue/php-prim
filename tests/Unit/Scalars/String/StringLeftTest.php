<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringLeftTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringLeftTest extends TestCase
{
    /** @test */
    public function string_left()
    {
        $this->assertEmpty(Str::left('БГДЖИЛЁ', 0)->value);
        $this->assertEmpty(Str::left('БГДЖИЛЁ', -0)->value);
        $this->assertEquals('Б', Str::left('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('Б', Str::left('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('БГД', Str::left('БГДЖИЛЁ', 3)->value);
        $this->assertEquals('БГД', Str::left('БГДЖИЛЁ', -3)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', 7)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', -7)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', 10)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', -10)->value);
    }
}
