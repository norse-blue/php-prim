<?php

namespace NorseBlue\Prim\Extensions\Scalars\Int;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\int;

/**
 * Class IntCompareExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Int
 */
class IntCompareExtension extends IntObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject|float|FloatObject $number): IntObject
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given value.
         * If a float is given, it cast as int before doing the comparison.
         *
         * @param int|IntObject|float|FloatObject $number
         *
         * @return \NorseBlue\Prim\Scalars\IntObject
         */
        return function ($number): IntObject {
            $number = self::unwrap($number);

            if (is_float($number)) {
                $number = (int)$number;
            }

            return int($this->object_value - $number);
        };
    }
}
