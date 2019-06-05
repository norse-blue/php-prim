<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringReplaceExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search, string|StringObject $replace): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Replace all occurrences of the search string with the replacement string.
         *
         * @param string|StringObject $search
         * @param string|StringObject $replace
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($search, $replace): StringObject {
            return string(str_replace($search, $replace, $this->value, $count));
        };
    }
}
