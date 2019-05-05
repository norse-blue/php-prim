<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringLcfirstTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringLcfirstTest extends TestCase
{
    /** @test */
    public function string_lcfirst()
    {
        $this->assertEquals('laravel', Str::lcfirst('Laravel')->value);
        $this->assertEquals('laravel Framework', Str::lcfirst('Laravel Framework')->value);
        $this->assertEquals('mама', Str::lcfirst('Mама')->value);
        $this->assertEquals('mама Mыла Pаму', Str::lcfirst('Mама Mыла Pаму')->value);
    }
}
