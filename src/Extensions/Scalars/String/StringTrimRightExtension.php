<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringTrimRightExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $character_mask = " \t\n\r\0\x0B"): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Strip whitespace (or other characters) from the end of a string.
         *
         * @param string|StringObject $character_mask
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         *
         * @see https://www.php.net/manual/en/function.rtrim.php
         */
        return function ($character_mask = " \t\n\r\0\x0B"): StringObject {
            return string(rtrim($this->value, self::unwrap($character_mask)));
        };
    }
}
