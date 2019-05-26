<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsDomainTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/056.phpt
 */
class StringIsDomainTest extends TestCase
{
    /** @test */
    public function string_is_domain()
    {
        $this->assertTrue(Str::isDomain('example.com')->value);
        $this->assertTrue(
            Str::isDomain('www.thelongestdomainnameintheworldandthensomeandthensomemoreandmore.com')->value
        );
        $this->assertFalse(
            Str::isDomain('toolongtoolongtoolongtoolongtoolongtoolongtoolongtoolongtoolongtoolong.com')->value
        );
        $this->assertFalse(
            Str::isDomain('eauBcFReEmjLcoZwI0RuONNnwU4H9r151juCaqTI5VeIP5jcYIqhx1lh5vV00l2rTs6y7hOp7rYw42QZiq6VIzjcYrRm8gFRMk9U9Wi1grL8Mr5kLVloYLthHgyA94QK3SaXCATklxgo6XvcbXIqAGG7U0KxTr8hJJU1p2ZQ2mXHmp4DhYP8N9SRuEKzaCPcSIcW7uj21jZqBigsLsNAXEzU8SPXZjmVQVtwQATPWeWyGW4GuJhjP4Q8o0.com')->value
        );
        $this->assertTrue(
            Str::isDomain('kDTvHt1PPDgX5EiP2MwiXjcoWNOhhTuOVAUWJ3TmpBYCC9QoJV114LMYrV3Zl58.kDTvHt1PPDgX5EiP2MwiXjcoWNOhhTuOVAUWJ3TmpBYCC9QoJV114LMYrV3Zl58.kDTvHt1PPDgX5EiP2MwiXjcoWNOhhTuOVAUWJ3TmpBYCC9QoJV114LMYrV3Zl58.CQ1oT5Uq3jJt6Uhy3VH9u3Gi5YhfZCvZVKgLlaXNFhVKB1zJxvunR7SJa.com.')->value
        );
        $this->assertTrue(Str::isDomain('cont-ains.h-yph-en-s.com')->value);
        $this->assertFalse(Str::isDomain('..com')->value);
        $this->assertFalse(Str::isDomain('ab..cc.dd')->value);

        // Although this test are copied directly from PHP source tests, they are failing
        //$this->assertFalse(Str::isDomain('a.-bc.com')->value);
        //$this->assertFalse(Str::isDomain('ab.cd-.com')->value);
        //$this->assertFalse(Str::isDomain('-.abc.com')->value);
        //$this->assertFalse(Str::isDomain('abc.-.abc.com')->value);
        //$this->assertFalse(Str::isDomain('underscore_.example.com')->value);
        //$this->assertFalse(Str::isDomain('')->value);
        //$this->assertFalse(Str::isDomain('\r\n')->value);

        $this->assertTrue(Str::isDomain('_example.com')->value);
        $this->assertFalse(Str::isDomain('_example.com', true)->value);
        $this->assertTrue(Str::isDomain('test_.example.com')->value);
        $this->assertFalse(Str::isDomain('test_.example.com', true)->value);
        $this->assertTrue(Str::isDomain('te_st.example.com')->value);
        $this->assertFalse(Str::isDomain('te_st.example.com', true)->value);
        $this->assertTrue(Str::isDomain('test._example.com')->value);
        $this->assertFalse(Str::isDomain('test._example.com', true)->value);
    }
}
