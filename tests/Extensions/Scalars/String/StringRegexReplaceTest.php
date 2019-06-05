<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringRegexReplaceTest extends TestCase
{
    /** @test */
    public function string_regex_replace()
    {
        $this->assertEquals(
            'April1,2003',
            Str::regexReplace(
                'April 15, 2003',
                '/(\w+) (\d+), (\d+)/i',
                '${1}1,$3'
            )->value
        );
        $this->assertEquals(
            'The slow black bear jumps over the lazy dog.',
            Str::regexReplace(
                'The quick brown fox jumps over the lazy dog.',
                [
                    '/quick/',
                    '/brown/',
                    '/fox/',
                ],
                [
                    'slow',
                    'black',
                    'bear',
                ]
            )->value
        );
        $this->assertEquals(
            '$startDate = 5/27/1999',
            Str::regexReplace(
                '{startDate} = 1999-5-27',
                [
                    '/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/',
                    '/^\s*{(\w+)}\s*=/',
                ],
                [
                    '\3/\4/\1\2',
                    '$\1 =',
                ]
            )->value
        );
        $this->assertEquals('foo o', Str::regexReplace('foo   o', '/\s\s+/', ' '));
        $this->assertEquals('xp***to', Str::regexReplace('xp 4 to', ['/\d/', '/\s/'], '*'));
    }
}
