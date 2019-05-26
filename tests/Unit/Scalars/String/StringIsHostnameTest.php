<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsHostnameTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/056.phpt
 */
class StringIsHostnameTest extends TestCase
{
    /** @test */
    public function string_is_hostname()
    {
        $this->assertFalse(Str::isHostname('_example.com')->value);
        $this->assertFalse(Str::isHostname('test_.example.com')->value);
        $this->assertFalse(Str::isHostname('te_st.example.com')->value);
        $this->assertFalse(Str::isHostname('test._example.com')->value);
    }
}
