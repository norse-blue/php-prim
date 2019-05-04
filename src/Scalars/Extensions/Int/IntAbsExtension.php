<?php

namespace NorseBlue\Prim\Scalars\Extensions\Int;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\int;

/**
 * Class IntAbsExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Int
 */
class IntAbsExtension extends IntObject implements ExtensionMethod
{
    /**
     * @return callable(): IntObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the absolute value.
         *
         * @return \NorseBlue\Prim\Scalars\IntObject
         */
        return function (): IntObject {
            return int(abs($this->object_value));
        };
    }
}
