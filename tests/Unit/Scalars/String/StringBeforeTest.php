<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringBeforeTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringBeforeTest extends TestCase
{
    /** @test */
    public function string_before()
    {
        $this->assertEquals('han', Str::before('hannah', 'nah')->value);
        $this->assertEquals('ha', Str::before('hannah', 'n')->value);
        $this->assertEquals('ééé ', Str::before('ééé hannah', 'han')->value);
        $this->assertEquals('hannah', Str::before('hannah', 'xxxx')->value);
        $this->assertEquals('hannah', Str::before('hannah', '')->value);
        $this->assertEquals('han', Str::before('han0nah', '0')->value);
    }
}
