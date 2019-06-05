<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use function NorseBlue\Prim\Functions\numeric;

final class NumericCompareExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumericObject $number): NumericObject
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given numeric value.
         *
         * @param int|float|NumericObject $number
         *
         * @return \NorseBlue\Prim\Types\Scalars\NumericObject
         */
        return function ($number): NumericObject {
            $number = self::unwrap($number);

            return numeric($this->value - $number);
        };
    }
}
