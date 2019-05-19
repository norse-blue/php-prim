<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Exceptions\Scalars\String\MacSeparatorLengthException;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;
use function NorseBlue\Prim\string;

/**
 * Class StringIsMacExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringIsMacExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $separator = null): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is a MAC address.
         *
         * @param string|StringObject|null $separator
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($separator = null): BoolObject {
            if ($separator !== null && string($separator)->length()->equals(1)->isFalse()) {
                throw new MacSeparatorLengthException('Separator must be exactly one character long.');
            }

            return bool(
                filter_var(
                    $this->object_value,
                    FILTER_VALIDATE_MAC,
                    $separator ? ['options' => ['separator' => self::unwrap($separator)]] : null
                ) !== false
            );
        };
    }
}
