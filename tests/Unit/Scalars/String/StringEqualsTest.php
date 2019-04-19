<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Scalars\StringObject;
use NorseBlue\Prim\Tests\TestCase;

class StringEqualsTest extends TestCase
{
    /** @test */
    public function string_equals()
    {
        $this->assertFalse(Str::equals('FGHIJ', 'ABCDE'));
        $this->assertFalse(Str::equals('FGHIJ', new StringObject('ABCDE')));
        $this->assertTrue(Str::equals('FGHIJ', 'FGHIJ'));
        $this->assertTrue(Str::equals('FGHIJ', new StringObject('FGHIJ')));
        $this->assertFalse(Str::equals('FGHIJ', 'KLMNO'));
        $this->assertFalse(Str::equals('FGHIJ', new StringObject('KLMNO')));
    }
}
