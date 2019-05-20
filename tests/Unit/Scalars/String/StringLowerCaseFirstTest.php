<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringLowerCaseFirstTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringLowerCaseFirstTest extends TestCase
{
    /** @test */
    public function string_lower_case_first()
    {
        $this->assertEquals('laravel', Str::lowerCaseFirst('Laravel')->value);
        $this->assertEquals('laravel Framework', Str::lowerCaseFirst('Laravel Framework')->value);
        $this->assertEquals('mама', Str::lowerCaseFirst('Mама')->value);
        $this->assertEquals('mама Mыла Pаму', Str::lowerCaseFirst('Mама Mыла Pаму')->value);
    }
}
