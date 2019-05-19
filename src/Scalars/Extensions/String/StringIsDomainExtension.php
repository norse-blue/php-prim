<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;

/**
 * Class StringIsDomainExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringIsDomainExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolObject $is_hostname = false): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is a domain.
         *
         * @param bool|BoolObject $is_hostname
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($is_hostname = false): BoolObject {
            return bool(
                filter_var(
                    $this->object_value,
                    FILTER_VALIDATE_DOMAIN,
                    BoolObject::unwrap($is_hostname) ? FILTER_FLAG_HOSTNAME : FILTER_FLAG_NONE
                ) !== false
            );
        };
    }
}
