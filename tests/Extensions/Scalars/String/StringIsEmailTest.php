<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsEmailTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/016.phpt
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/058.phpt
 */
class StringIsEmailTest extends TestCase
{
    /** @test */
    public function string_is_email()
    {
        $this->assertTrue(Str::isEmail('a@b.c')->value);
        $this->assertTrue(Str::isEmail('abuse@example.com')->value);
        $this->assertFalse(Str::isEmail('test!.!@#$%^&*@example.com')->value);
        $this->assertFalse(Str::isEmail('test@@#$%^&*())).com')->value);
        $this->assertFalse(Str::isEmail('test@.com')->value);
        $this->assertFalse(Str::isEmail('test@com')->value);
        $this->assertFalse(Str::isEmail('@')->value);
        $this->assertFalse(Str::isEmail('[]()/@example.com')->value);
        $this->assertTrue(Str::isEmail('QWERTYUIOPASDFGHJKLZXCVBNM@QWERTYUIOPASDFGHJKLZXCVBNM.NET')->value);
        $this->assertFalse(Str::isEmail('e.x.a.m.p.l.e.@example.com')->value);
        $this->assertTrue(Str::isEmail('firstname.lastname@employee.2something.com')->value);
        $this->assertTrue(Str::isEmail('-@foo.com')->value);
        $this->assertFalse(Str::isEmail('foo@-.com')->value);
        $this->assertFalse(Str::isEmail('foo@bar.123')->value);
        $this->assertFalse(Str::isEmail('foo@bar.-')->value);
    }

    /** @test */
    public function string_is_email_unicode()
    {
        $this->assertTrue(Str::isEmail('niceändsimple@example.com', true)->value);
        $this->assertTrue(Str::isEmail('véry.çommon@example.com', true)->value);
        $this->assertTrue(Str::isEmail('a.lîttle.lengthy.but.fiñe@dept.example.com', true)->value);
        $this->assertTrue(
            Str::isEmail('dîsposable.style.émail.with+symbol@example.com', true)->value
        );
        $this->assertTrue(Str::isEmail('other.émail-with-dash@example.com', true)->value);
        $this->assertTrue(Str::isEmail('üser@[IPv6:2001:db8:1ff::a0b:dbd0]', true)->value);
        $this->assertTrue(Str::isEmail('"verî.uñusual.@.uñusual.com"@example.com', true)->value);
        $this->assertTrue(
            Str::isEmail(
                '"verî.(),:;<>[]\".VERÎ.\"verî@\ \"verî\".unüsual"@strange.example.com',
                true
            )->value
        );
        $this->assertTrue(Str::isEmail('tést@example.com', true)->value);
        $this->assertTrue(Str::isEmail('tést.child@example.com', true)->value);
        $this->assertTrue(Str::isEmail('tést@xn--exmple-cua.com', true)->value);
        $this->assertTrue(Str::isEmail('tést@xn----zfa.xe', true)->value);
        $this->assertTrue(Str::isEmail('tést@subexample.wizard', true)->value);
        $this->assertTrue(Str::isEmail('tést@[255.255.255.255]', true)->value);
        $this->assertTrue(
            Str::isEmail('tést@[IPv6:2001:0db8:85a3:08d3:1319:8a2e:0370:7344]', true)->value
        );
        $this->assertTrue(Str::isEmail('tést@[IPv6:2001::7344]', true)->value);
        $this->assertTrue(
            Str::isEmail('tést@[IPv6:1111:2222:3333:4444:5555:6666:255.255.255.255]', true)->value
        );
        $this->assertTrue(Str::isEmail('tést+reference@example.com', true)->value);
        $this->assertTrue(Str::isEmail('üñîçøðé@example.com', true)->value);
        $this->assertTrue(Str::isEmail('"üñîçøðé"@example.com', true)->value);
        $this->assertTrue(Str::isEmail('ǅǼ੧ఘⅧ⒇৪@example.com', true)->value);
    }
}
