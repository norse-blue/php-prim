<?php

namespace NorseBlue\Prim\Scalars\Extensions\Float;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\bool;

/**
 * Class FloatLessThanExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Float
 */
class FloatLessThanExtension extends FloatObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject|float|FloatObject $number): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if the value is less than the given number.
         *
         * @param int|IntObject|float|FloatObject $number
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function ($number): BoolObject {
            return bool($this->object_value < self::unwrap($number));
        };
    }
}
