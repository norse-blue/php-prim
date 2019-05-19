<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsIpTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/018.phpt
 */
class StringIsIpTest extends TestCase
{
    /** @test */
    public function string_is_ip()
    {
        $this->assertTrue(Str::isIp("192.168.0.1")->value);
        $this->assertFalse(Str::isIp("192.168.0.1.1")->value);
        $this->assertTrue(Str::isIp("::1")->value);
        $this->assertTrue(Str::isIp("fe00::0")->value);
        $this->assertFalse(Str::isIp("::123456")->value);
        $this->assertFalse(Str::isIp("::1::b")->value);
        $this->assertTrue(Str::isIp("127.0.0.1")->value);
        $this->assertFalse(Str::isIp("192.168.0.1", FILTER_FLAG_NO_PRIV_RANGE)->value);
        $this->assertTrue(Str::isIp("192.0.34.166", FILTER_FLAG_NO_PRIV_RANGE)->value);
        $this->assertFalse(Str::isIp("127.0.0.1", FILTER_FLAG_NO_RES_RANGE)->value);
        $this->assertTrue(Str::isIp("192.0.0.1", FILTER_FLAG_NO_RES_RANGE)->value);
        $this->assertTrue(Str::isIp("100.64.0.0", FILTER_FLAG_NO_RES_RANGE)->value);
        $this->assertTrue(Str::isIp("100.127.255.255", FILTER_FLAG_NO_RES_RANGE)->value);
        $this->assertTrue(Str::isIp("192.0.34.166")->value);
        $this->assertFalse(Str::isIp("256.1237.123.1")->value);
        $this->assertTrue(Str::isIp("255.255.255.255")->value);
        $this->assertFalse(Str::isIp("255.255.255.255", FILTER_FLAG_NO_RES_RANGE)->value);
        $this->assertFalse(Str::isIp("")->value);
        $this->assertFalse(Str::isIp("::1", FILTER_FLAG_IPV4)->value);
        $this->assertFalse(Str::isIp("127.0.0.1", FILTER_FLAG_IPV6)->value);
        $this->assertTrue(Str::isIp("::1", FILTER_FLAG_IPV6)->value);
        $this->assertFalse(Str::isIp("::1", FILTER_FLAG_IPV6 | FILTER_FLAG_NO_RES_RANGE)->value);
        $this->assertTrue(Str::isIp("127.0.0.1", FILTER_FLAG_IPV4)->value);
    }
}
