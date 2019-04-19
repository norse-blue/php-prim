<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringBeforeTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringBeforeTest extends TestCase
{
    /** @test */
    public function string_before()
    {
        $this->assertEquals('han', Str::before('hannah', 'nah'));
        $this->assertEquals('ha', Str::before('hannah', 'n'));
        $this->assertEquals('ééé ', Str::before('ééé hannah', 'han'));
        $this->assertEquals('hannah', Str::before('hannah', 'xxxx'));
        $this->assertEquals('hannah', Str::before('hannah', ''));
        $this->assertEquals('han', Str::before('han0nah', '0'));
    }
}
