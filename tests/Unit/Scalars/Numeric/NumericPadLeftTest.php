<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\Numeric;

use NorseBlue\Prim\Facades\Scalars\NumericFacade as Numeric;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class NumericPadLeftTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\Numeric
 */
class NumericPadLeftTest extends TestCase
{
    /** @test */
    public function numeric_pad_left()
    {
        $this->assertEquals('9', Numeric::padLeft(9, 1)->value);
        $this->assertEquals('9.3', Numeric::padLeft(9.3, 1)->value);
        $this->assertEquals('009', Numeric::padLeft(9, 3)->value);
        $this->assertEquals('9.3', Numeric::padLeft(9.3, 3)->value);
        $this->assertEquals('0000009', Numeric::padLeft(9, 7)->value);
        $this->assertEquals('00009.3', Numeric::padLeft(9.3, 7)->value);
        $this->assertEquals('######9', Numeric::padLeft(9, 7, '#')->value);
        $this->assertEquals('####9.3', Numeric::padLeft(9.3, 7, '#')->value);
    }
}
