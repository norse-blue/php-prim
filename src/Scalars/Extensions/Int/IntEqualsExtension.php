<?php

namespace NorseBlue\Prim\Scalars\Extensions\Int;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\bool;

/**
 * Class IntEqualsExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Int
 */
class IntEqualsExtension extends IntObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject|float|FloatObject $number): BoolObject
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
            return bool($this->compare($number)->value === 0);
        };
    }
}