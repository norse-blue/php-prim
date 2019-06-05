<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringPrefixExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $prefix): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Prefix the string with the given value.
         *
         * @param string|StringObject $prefix
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($prefix): StringObject {
            return string($prefix . $this->value);
        };
    }
}
