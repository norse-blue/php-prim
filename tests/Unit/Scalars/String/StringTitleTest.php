<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringTitleTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringTitleTest extends TestCase
{
    /** @test */
    public function string_title()
    {
        $this->assertEquals('Jefferson Costella', Str::title('jefferson costella')->value);
        $this->assertEquals('Jefferson Costella', Str::title('jefFErson coSTella')->value);
    }
}
