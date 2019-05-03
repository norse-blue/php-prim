<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

class StringRegexQuoteExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Quote a regex string.
         *
         * @param string|StringObject|null $delimiter
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($delimiter = null): StringObject {
            return string(preg_quote($this->object_value, self::unwrap($delimiter)));
        };
    }
}
