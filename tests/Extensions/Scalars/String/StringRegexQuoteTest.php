<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

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
