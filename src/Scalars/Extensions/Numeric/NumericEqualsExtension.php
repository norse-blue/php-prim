<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\NumericObject;
use function NorseBlue\Prim\bool;

/**
 * Class NumericEqualsExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Numeric
 */
final class NumericEqualsExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(int|float|NumericObject $number): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given value for equality.
         *
         * @param int|float|NumericObject $number
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function ($number): BoolObject {
            return bool((float)$this->compare($number)->value === 0.0);
        };
    }
}
