<?php

namespace NorseBlue\Prim\Scalars\Extensions\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\NumericObject;
use function NorseBlue\Prim\numeric;

/**
 * Class NumericAbsExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Numeric
 */
class NumericAbsExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(): NumericObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the absolute value.
         *
         * @return \NorseBlue\Prim\Scalars\NumericObject
         */
        return function (): NumericObject {
            return numeric(abs($this->object_value));
        };
    }
}
