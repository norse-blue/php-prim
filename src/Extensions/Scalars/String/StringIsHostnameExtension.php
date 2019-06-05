<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

final class StringIsHostnameExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is a hostname.
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function (): BoolObject {
            return $this->isDomain(true);
        };
    }
}
