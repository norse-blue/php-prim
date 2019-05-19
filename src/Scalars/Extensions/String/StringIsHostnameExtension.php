<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class StringIsHostnameExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringIsHostnameExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is a hostname.
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function (): BoolObject {
            return $this->isDomain(true);
        };
    }
}
