<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringRegexQuoteExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringRegexQuoteExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|null $delimiter = null): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Quote a regex string.
         *
         * @param string|StringObject|null $delimiter
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         *
         * @see https://www.php.net/manual/en/function.preg-quote.php
         */
        return function ($delimiter = null): StringObject {
            return string(preg_quote($this->object_value, self::unwrap($delimiter)));
        };
    }
}
