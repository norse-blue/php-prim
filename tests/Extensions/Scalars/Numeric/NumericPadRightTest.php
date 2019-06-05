<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\Numeric;

use NorseBlue\Prim\Facades\Scalars\NumericFacade as Numeric;
use NorseBlue\Prim\Tests\TestCase;

class NumericPadRightTest extends TestCase
{
    /** @test */
    public function numeric_pad_right()
    {
        $this->assertEquals('9', Numeric::padRight(9, 1)->value);
        $this->assertEquals('9.3', Numeric::padRight(9.3, 1)->value);
        $this->assertEquals('900', Numeric::padRight(9, 3)->value);
        $this->assertEquals('9.3', Numeric::padRight(9.3, 3)->value);
        $this->assertEquals('9000000', Numeric::padRight(9, 7)->value);
        $this->assertEquals('9.30000', Numeric::padRight(9.3, 7)->value);
        $this->assertEquals('9######', Numeric::padRight(9, 7, '#')->value);
        $this->assertEquals('9.3####', Numeric::padRight(9.3, 7, '#')->value);
    }
}
