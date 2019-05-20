<?php

namespace NorseBlue\Prim\Scalars\Extensions\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\NumericObject;
use function NorseBlue\Prim\bool;

/**
 * Class NumericLessThanExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Numeric
 */
final class NumericLessThanExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumericObject $number): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if the value is less than the given number.
         *
         * @param int|float|NumericObject $number
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function ($number): BoolObject {
            return bool($this->object_value < self::unwrap($number));
        };
    }
}
