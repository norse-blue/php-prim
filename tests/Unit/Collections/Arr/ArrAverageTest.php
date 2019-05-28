<?php

namespace NorseBlue\Prim\Tests\Unit\Collections\Arr;

use NorseBlue\Prim\Facades\Collections\ArrFacade as Arr;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class ArrAverageTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Collections\Arr
 */
class ArrAverageTest extends TestCase
{
    /** @test */
    public function arr_average()
    {
        $average1 = [5, 10, 15, 20];
        $average2 = ['foo', 'b', 'ar'];
        $average3 = [['lol'], 10, 20];

        $average1 = Arr::average($average1);
        $average2 = Arr::average($average2);
        $average3 = Arr::average($average3);

        $this->assertEquals(13, $average1->value);
        $this->assertEquals(0, $average2->value);
        $this->assertEquals(10, $average3->value);
    }
}
