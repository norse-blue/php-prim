<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

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
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         *
         * @see https://www.php.net/manual/en/function.preg-quote.php
         */
        return function ($delimiter = null): StringObject {
            if ($delimiter !== null) {
                return string(preg_quote($this->value, (string)self::unwrap($delimiter)));
            }

            return string(preg_quote($this->value));
        };
    }
}
