<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringIsUrlTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/015.phpt
 */
class StringIsUrlTest extends TestCase
{
    /** @test */
    public function string_is_url()
    {
        $this->assertTrue(Str::isUrl('http://example.com/index.html')->value);
        $this->assertTrue(Str::isUrl('http://www.example.com/index.php')->value);
        $this->assertTrue(Str::isUrl('http://www.example/img/test.png')->value);
        $this->assertTrue(Str::isUrl('http://www.example/img/dir/')->value);
        $this->assertTrue(Str::isUrl('http://www.example/img/dir')->value);
        $this->assertTrue(
            Str::isUrl('http://www.thelongestdomainnameintheworldandthensomeandthensomemoreandmore.com/')->value
        );
        $this->assertFalse(
            Str::isUrl('http://toolongtoolongtoolongtoolongtoolongtoolongtoolongtoolongtoolongtoolong.com')->value
        );
        $this->assertFalse(
            Str::isUrl('http://eauBcFReEmjLcoZwI0RuONNnwU4H9r151juCaqTI5VeIP5jcYIqhx1lh5vV00l2rTs6y7hOp7rYw42QZiq6VIzjcYrRm8gFRMk9U9Wi1grL8Mr5kLVloYLthHgyA94QK3SaXCATklxgo6XvcbXIqAGG7U0KxTr8hJJU1p2ZQ2mXHmp4DhYP8N9SRuEKzaCPcSIcW7uj21jZqBigsLsNAXEzU8SPXZjmVQVtwQATPWeWyGW4GuJhjP4Q8o0.com')->value
        );
        $this->assertTrue(
            Str::isUrl('http://kDTvHt1PPDgX5EiP2MwiXjcoWNOhhTuOVAUWJ3TmpBYCC9QoJV114LMYrV3Zl58.kDTvHt1PPDgX5EiP2MwiXjcoWNOhhTuOVAUWJ3TmpBYCC9QoJV114LMYrV3Zl58.kDTvHt1PPDgX5EiP2MwiXjcoWNOhhTuOVAUWJ3TmpBYCC9QoJV114LMYrV3Zl58.CQ1oT5Uq3jJt6Uhy3VH9u3Gi5YhfZCvZVKgLlaXNFhVKB1zJxvunR7SJa.com.')->value
        );
        $this->assertFalse(
            Str::isUrl('http://kDTvHt1PPDgX5EiP2MwiXjcoWNOhhTuOVAUWJ3TmpBYCC9QoJV114LMYrV3Zl58R.example.com')->value
        );
        $this->assertTrue(Str::isUrl('http://[2001:0db8:0000:85a3:0000:0000:ac1f:8001]')->value);
        $this->assertTrue(Str::isUrl('http://[2001:db8:0:85a3:0:0:ac1f:8001]:123/me.html')->value);
        $this->assertTrue(Str::isUrl('http://[2001:db8:0:85a3::ac1f:8001]/')->value);
        $this->assertTrue(Str::isUrl('http://[::1]')->value);
        $this->assertTrue(Str::isUrl('http://cont-ains.h-yph-en-s.com')->value);
        $this->assertFalse(Str::isUrl('http://..com')->value);
        $this->assertFalse(Str::isUrl('http://a.-bc.com')->value);
        $this->assertFalse(Str::isUrl('http://ab.cd-.com')->value);
        $this->assertFalse(Str::isUrl('http://-.abc.com')->value);
        $this->assertFalse(Str::isUrl('http://abc.-.abc.com')->value);
        $this->assertFalse(Str::isUrl('http://underscore_.example.com')->value);
        $this->assertFalse(Str::isUrl('http//www.example/wrong/url/')->value);
        $this->assertFalse(Str::isUrl('http:/www.example')->value);
        $this->assertTrue(Str::isUrl('file:///tmp/test.c')->value);
        $this->assertTrue(Str::isUrl('ftp://ftp.example.com/tmp/')->value);
        $this->assertFalse(Str::isUrl('/tmp/test.c')->value);
        $this->assertFalse(Str::isUrl('/')->value);
        $this->assertFalse(Str::isUrl('http://')->value);
        $this->assertFalse(Str::isUrl('http:/')->value);
        $this->assertFalse(Str::isUrl('http:')->value);
        $this->assertFalse(Str::isUrl('http')->value);
        $this->assertFalse(Str::isUrl('')->value);
        $this->assertTrue(Str::isUrl('mailto:foo@bar.com')->value);
        $this->assertTrue(Str::isUrl('news:news.php.net')->value);
        $this->assertTrue(Str::isUrl('file://foo/bar')->value);
        $this->assertFalse(Str::isUrl("http://\r\n/bar")->value);
        $this->assertFalse(Str::isUrl("http://example.com:qq")->value);
        $this->assertFalse(Str::isUrl("http://example.com:-2")->value);
        $this->assertFalse(Str::isUrl("http://example.com:65536")->value);
        $this->assertFalse(Str::isUrl("http://example.com:65537")->value);

        $this->assertFalse(Str::isUrl("qwe")->value);
        $this->assertTrue(Str::isUrl("http://qwe")->value);
        $this->assertFalse(Str::isUrl("http://")->value);
        $this->assertFalse(Str::isUrl("/tmp/test")->value);
        $this->assertTrue(Str::isUrl("http://www.example.com")->value);
        $this->assertFalse(Str::isUrl("http://www.example.com", FILTER_FLAG_PATH_REQUIRED)->value);
        $this->assertTrue(Str::isUrl("http://www.example.com/path/at/the/server/", FILTER_FLAG_PATH_REQUIRED)->value);
        $this->assertFalse(Str::isUrl("http://www.example.com/index.html", FILTER_FLAG_QUERY_REQUIRED)->value);
        $this->assertTrue(Str::isUrl("http://www.example.com/index.php?a=b&c=d", FILTER_FLAG_QUERY_REQUIRED)->value);
    }
}
