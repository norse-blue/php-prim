<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringAfterTest extends TestCase
{
    /** @test */
    public function string_after()
    {
        $this->assertEquals('nah', Str::after('hannah', 'han')->value);
        $this->assertEquals('nah', Str::after('hannah', 'n')->value);
        $this->assertEquals('nah', Str::after('ééé hannah', 'han')->value);
        $this->assertEquals('hannah', Str::after('hannah', 'xxxx')->value);
        $this->assertEquals('hannah', Str::after('hannah', '')->value);
        $this->assertEquals('nah', Str::after('han0nah', '0')->value);
    }
}
