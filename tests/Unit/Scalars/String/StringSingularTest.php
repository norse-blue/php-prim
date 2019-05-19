<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringSingularTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringSingularTest extends TestCase
{
    /** @test */
    public function string_singular()
    {
        $this->assertEquals('code', Str::singular('codes')->value);
        $this->assertEquals('method', Str::singular('methods')->value);
        $this->assertEquals('person', Str::singular('people')->value);
        $this->assertEquals('person', Str::singular('person')->value);
        $this->assertEquals('child', Str::singular('children')->value);
    }
}
