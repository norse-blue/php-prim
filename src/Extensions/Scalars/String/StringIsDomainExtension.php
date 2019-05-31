<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class StringIsDomainExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringIsDomainExtension extends StringObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         *
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
