<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringSuffixExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $suffix): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Prefix the string with the given value.
         *
         * @param string|StringObject $suffix
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($suffix): StringObject {
            return string($this->value . $suffix);
        };
    }
}
