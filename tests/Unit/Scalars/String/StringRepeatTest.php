<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringRepeatTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringRepeatTest extends TestCase
{
    /** @test */
    public function string_repeat()
    {
        $this->assertEquals('', Str::repeat('')->value);
        $this->assertEquals('', Str::repeat('', 0)->value);
        $this->assertEquals('', Str::repeat('', 1)->value);
        $this->assertEquals('', Str::repeat('', 3)->value);
        $this->assertEquals('', Str::repeat('', 9)->value);

        $this->assertEquals('##', Str::repeat('#')->value);
        $this->assertEquals('', Str::repeat('#', 0)->value);
        $this->assertEquals('#', Str::repeat('#', 1)->value);
        $this->assertEquals('###', Str::repeat('#', 3)->value);
        $this->assertEquals('#########', Str::repeat('#', 9)->value);
    }
}
