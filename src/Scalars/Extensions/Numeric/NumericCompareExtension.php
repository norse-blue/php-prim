<?php

namespace NorseBlue\Prim\Scalars\Extensions\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\NumericObject;
use function NorseBlue\Prim\numeric;

/**
 * Class NumericCompareExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Numeric
 */
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
         * @return \NorseBlue\Prim\Scalars\NumericObject
         */
        return function ($number): NumericObject {
            $number = self::unwrap($number);

            return numeric($this->object_value - $number);
        };
    }
}
