<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringAsciiTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringAsciiTest extends TestCase
{
    /** @test */
    public function string_ascii()
    {
        $this->assertEquals('@', Str::ascii('@')->value);
        $this->assertEquals('u', Str::ascii('ü')->value);
    }

    /** @test */
    public function string_ascii_with_specific_locale()
    {
        $this->assertEquals('h H sht SHT a A y Y', Str::ascii('х Х щ Щ ъ Ъ ь Ь', 'bg')->value);
        $this->assertEquals('ae oe ue AE OE UE', Str::ascii('ä ö ü Ä Ö Ü', 'de')->value);
    }
}
