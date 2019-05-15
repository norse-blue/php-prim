<?php

namespace NorseBlue\Prim\Scalars\Extensions\Float;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\FloatObject;
use function NorseBlue\Prim\float;

/**
 * Class FloatAbsExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Float
 */
class FloatAbsExtension extends FloatObject implements ExtensionMethod
{
    /**
     * @return callable(): FloatObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the absolute value.
         *
         * @return \NorseBlue\Prim\Scalars\FloatObject
         */
        return function (): FloatObject {
            return float(abs($this->object_value));
        };
    }
}
