<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Collections\Arr;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Collections\ArrObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use function NorseBlue\Prim\Functions\numeric;

final class ArrAverageExtension extends ArrObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $decimals = 0): NumericObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the average value of the items.
         *
         * @param int|IntObject $decimals
         *
         * @return \NorseBlue\Prim\Types\Scalars\NumericObject
         */
        return function ($decimals = 0): NumericObject {
            return numeric(round((array_sum($this->items) / count($this->items)), IntObject::unwrap($decimals)));
        };
    }
}
