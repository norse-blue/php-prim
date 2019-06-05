<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Exceptions\Scalars\String\MacSeparatorLengthException;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;
use function NorseBlue\Prim\Functions\string;

final class StringIsMacExtension extends StringObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($separator = null): BoolObject {
            if ($separator !== null && string($separator)->length()->equals(1)->isFalse()) {
                throw new MacSeparatorLengthException('Separator must be exactly one character long.');
            }

            return bool(
                filter_var(
                    $this->value,
                    FILTER_VALIDATE_MAC,
                    $separator ? ['options' => ['separator' => self::unwrap($separator)]] : null
                ) !== false
            );
        };
    }
}
