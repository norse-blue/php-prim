<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Collections\Arr;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Collections\ArrObject;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use function NorseBlue\Prim\Functions\bool;

final class ArrContainsExtension extends ArrObject implements ExtensionMethod
{
    /**
     * @return callable(mixed $needle, bool|BoolObject $strict = false): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if an item is in an array.
         *
         * @param mixed $needle
         * @param bool|BoolObject $strict
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function ($needle, $strict = false): BoolObject {
            return bool(in_array($needle, $this->items, BoolObject::unwrap($strict)));
        };
    }
}
