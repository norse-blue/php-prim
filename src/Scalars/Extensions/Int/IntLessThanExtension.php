<?php

namespace NorseBlue\Prim\Scalars\Extensions\Int;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\bool;

/**
 * Class IntLessThanExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Int
 */
class IntLessThanExtension extends IntObject implements ExtensionMethod
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