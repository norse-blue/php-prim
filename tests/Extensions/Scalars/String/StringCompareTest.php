<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use NorseBlue\Prim\Types\Scalars\StringObject;

class StringCompareTest extends TestCase
{
    /** @test */
    public function string_compare()
    {
        $this->assertGreaterThan(0, Str::compare('FGHIJ', 'ABCDE')->value);
        $this->assertGreaterThan(0, Str::compare('FGHIJ', new StringObject('ABCDE'))->value);
        $this->assertEquals(0, Str::compare('FGHIJ', 'FGHIJ')->value);
        $this->assertEquals(0, Str::compare('FGHIJ', new StringObject('FGHIJ'))->value);
        $this->assertLessThan(0, Str::compare('FGHIJ', 'KLMNO')->value);
        $this->assertLessThan(0, Str::compare('FGHIJ', new StringObject('KLMNO'))->value);
    }
}
