<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Numeric;

use NorseBlue\Prim\Facades\Scalars\NumericFacade as Numeric;
use NorseBlue\Prim\Tests\TestCase;

class NumericPadTest extends TestCase
{
    /** @test */
    public function numeric_pad()
    {
        $this->assertEquals('9', Numeric::pad(9, 1)->value);
        $this->assertEquals('9.3', Numeric::pad(9.3, 1)->value);
        $this->assertEquals('090', Numeric::pad(9, 3)->value);
        $this->assertEquals('9.3', Numeric::pad(9.3, 3)->value);
        $this->assertEquals('0009000', Numeric::pad(9, 7)->value);
        $this->assertEquals('009.300', Numeric::pad(9.3, 7)->value);
        $this->assertEquals('###9###', Numeric::pad(9, 7, '#')->value);
        $this->assertEquals('##9.3##', Numeric::pad(9.3, 7, '#')->value);
        $this->assertEquals('009', Numeric::pad(9, 3, '0', STR_PAD_LEFT)->value);
        $this->assertEquals('9.3', Numeric::pad(9.3, 3, '0', STR_PAD_LEFT)->value);
        $this->assertEquals('900', Numeric::pad(9, 3, '0', STR_PAD_RIGHT)->value);
        $this->assertEquals('9.3', Numeric::pad(9.3, 3, '0', STR_PAD_RIGHT)->value);
    }
}
