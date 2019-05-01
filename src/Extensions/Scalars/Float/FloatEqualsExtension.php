<?php

namespace NorseBlue\Prim\Extensions\Scalars\Float;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\bool;

/**
 * Class FloatEqualsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Float
 */
class FloatEqualsExtension extends FloatObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject|float|FloatObject $number)
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given value for equality.
         *
         * @param int|IntObject|float|FloatObject $number
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function ($number): BoolObject {
            return bool($this->compare($number)->value === 0.0);
        };
    }
}
