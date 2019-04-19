<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringWordsTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringWordsTest extends TestCase
{
    /** @test */
    public function string_can_be_limited_by_words()
    {
        $this->assertEquals('Taylor...', Str::words('Taylor Otwell', 1));
        $this->assertEquals('Taylor___', Str::words('Taylor Otwell', 1, '___'));
        $this->assertEquals('Taylor Otwell', Str::words('Taylor Otwell', 3));
    }

    /** @test */
    public function string_trimmed_only_where_necessary()
    {
        $this->assertEquals(' Taylor Otwell ', Str::words(' Taylor Otwell ', 3));
        $this->assertEquals(' Taylor...', Str::words(' Taylor Otwell ', 1));
    }

    /** @test */
    public function string_without_words_doesnt_produce_error()
    {
        $nbsp = chr(0xC2) . chr(0xA0);
        $this->assertEquals(' ', Str::words(' '));
        $this->assertEquals($nbsp, Str::words($nbsp));
    }
}
