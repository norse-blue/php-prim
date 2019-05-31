<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class NumericEqualsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Numeric
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
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function ($number): BoolObject {
            return bool((float)$this->compare($number)->value === 0.0);
        };
    }
}
