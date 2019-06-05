<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use function NorseBlue\Prim\Functions\bool;

final class NumericGreaterThanOrEqualExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumericObject $number): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if the value is greater than or equal to the given number.
         *
         * @param int|float|NumericObject $number
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function ($number): BoolObject {
            return bool($this->value >= self::unwrap($number));
        };
    }
}
