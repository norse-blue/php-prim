<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Strings
 */
class StringRegexQuoteTest extends TestCase
{
    /** @test */
    public function string_matches()
    {
        $this->assertEquals('', Str::regexQuote('')->value);
        $this->assertEquals('\#\^this is a string\$\#', Str::regexQuote('#^this is a string$#')->value);
        $this->assertEquals('\#\^this is a string\$\#', Str::regexQuote('#^this is a string$#', '%')->value);
        $this->assertEquals('\%\^this is a string\$\%', Str::regexQuote('%^this is a string$%', '%')->value);
    }
}
