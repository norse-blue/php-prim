<?php

namespace NorseBlue\Prim\Scalars\Extensions\Float;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\bool;

/**
 * Class FloatGreaterThanOrEqualExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Float
 */
class FloatGreaterThanOrEqualExtension extends FloatObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject|float|FloatObject $number): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if the value is greater than or equal to the given number.
         *
         * @param int|IntObject|float|FloatObject $number
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function ($number): BoolObject {
            return bool($this->object_value >= self::unwrap($number));
        };
    }
}
