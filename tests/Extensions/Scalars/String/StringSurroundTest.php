<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringSurroundTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringSurroundTest extends TestCase
{
    /** @test */
    public function string_surround()
    {
        $this->assertEquals('#hello world#', Str::surround('hello world', '#')->value);
        $this->assertEquals('#hello world#', Str::surround('hello world', string('#'))->value);
        $this->assertEquals('(hello world)', Str::surround('hello world', '(', ')')->value);
        $this->assertEquals('(hello world)', Str::surround('hello world', string('('), string(')'))->value);
    }
}
