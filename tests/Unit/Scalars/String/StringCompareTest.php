<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Scalars\StringObject;
use NorseBlue\Prim\Tests\TestCase;

class StringCompareTest extends TestCase
{
    /** @test */
    public function string_compare()
    {
        $this->assertGreaterThan(0, Str::compare('FGHIJ', 'ABCDE'));
        $this->assertGreaterThan(0, Str::compare('FGHIJ', new StringObject('ABCDE')));
        $this->assertEquals(0, Str::compare('FGHIJ', 'FGHIJ'));
        $this->assertEquals(0, Str::compare('FGHIJ', new StringObject('FGHIJ')));
        $this->assertLessThan(0, Str::compare('FGHIJ', 'KLMNO'));
        $this->assertLessThan(0, Str::compare('FGHIJ', new StringObject('KLMNO')));
    }
}
