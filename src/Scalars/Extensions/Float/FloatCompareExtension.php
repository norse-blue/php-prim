<?php

namespace NorseBlue\Prim\Scalars\Extensions\Float;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\float;

/**
 * Class FloatCompareExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Float
 */
class FloatCompareExtension extends FloatObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject|float|FloatObject $number): FloatObject
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given value.
         *
         * @param int|IntObject|float|FloatObject $number
         *
         * @return \NorseBlue\Prim\Scalars\FloatObject
         */
        return function ($number): FloatObject {
            $number = self::unwrap($number);

            return float($this->object_value - $number);
        };
    }
}
