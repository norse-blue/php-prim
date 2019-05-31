<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use function NorseBlue\Prim\Functions\numeric;

/**
 * Class NumericAbsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Numeric
 */
final class NumericAbsExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(): NumericObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the absolute value.
         *
         * @return \NorseBlue\Prim\Types\Scalars\NumericObject
         */
        return function (): NumericObject {
            return numeric(abs($this->object_value));
        };
    }
}
