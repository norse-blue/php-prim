<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Collections\Extensions\Arr;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Collections\ArrObject;
use NorseBlue\Prim\Scalars\BoolObject;
use function NorseBlue\Prim\bool;

/**
 * Class ArrContainsExtension
 *
 * @package NorseBlue\Prim\Collections\Extensions\Arr
 */
class ArrContainsExtension extends ArrObject implements ExtensionMethod
{
    /**
     * @return callable(mixed $value, bool|BoolObject $strict = false): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if an item is in an array.
         *
         * @param mixed $needle
         * @param bool|BoolObject $strict
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function ($needle, $strict = false): BoolObject {
            return bool(in_array($needle, $this->items, BoolObject::unwrap($strict)));
        };
    }
}
