<?php

namespace NorseBlue\Prim\Extensions\Scalars\Int;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use function NorseBlue\Prim\int;

/**
 * Class IntAbsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Int
 */
class IntAbsExtension extends IntObject implements ExtensionMethod
{
    /**
     * @return callable()
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
