<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringTrimExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringTrimExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $character_mask = " \t\n\r\0\x0B"): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Strip whitespace (or other characters) from the beginning and end of a string.
         *
         * @param string|StringObject $character_mask
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         * @see https://www.php.net/manual/en/function.trim.php
         */
        return function ($character_mask = " \t\n\r\0\x0B"): StringObject {
            return string(trim($this->object_value, self::unwrap($character_mask)));
        };
    }
}
