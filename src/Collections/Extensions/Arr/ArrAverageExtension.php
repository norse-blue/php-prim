<?php

namespace NorseBlue\Prim\Collections\Extensions\Arr;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Collections\ArrObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\NumericObject;
use function NorseBlue\Prim\numeric;

/**
 * Class ArrAverageExtension
 *
 * @package NorseBlue\Prim\Collections\Extensions\Arr
 */
class ArrAverageExtension extends ArrObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $decimals = 0)
     */
    public function __invoke(): callable
    {
        /**
         * Get the average value of the items.
         *
         * @param int|IntObject $decimals
         *
         * @return \NorseBlue\Prim\Scalars\NumericObject
         */
        return function ($decimals = 0): NumericObject {
            return numeric(round((array_sum($this->items) / count($this->items)), IntObject::unwrap($decimals)));
        };
    }
}
