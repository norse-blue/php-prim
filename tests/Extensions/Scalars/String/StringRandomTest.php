<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Class StringRandomTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringRandomTest extends TestCase
{
    /** @test */
    public function string_random()
    {
        $this->assertEquals(16, strlen(Str::random()));
        $randomInteger = random_int(1, 100);
        $this->assertEquals($randomInteger, strlen(Str::random($randomInteger)));
        $this->assertInstanceOf(StringObject::class, Str::random());
    }
}
