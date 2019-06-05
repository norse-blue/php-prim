<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringTitleTest extends TestCase
{
    /** @test */
    public function string_title()
    {
        $this->assertEquals('Jefferson Costella', Str::title('jefferson costella')->value);
        $this->assertEquals('Jefferson Costella', Str::title('jefFErson coSTella')->value);
    }
}
