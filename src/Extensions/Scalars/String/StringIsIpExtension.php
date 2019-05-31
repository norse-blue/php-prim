<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class StringIsIpExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringIsIpExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $flags = FILTER_FLAG_NONE): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is an IP address.
         *
         * @param int|IntObject $flags Allowed flags:
         *                              - FILTER_FLAG_IPV4
         *                              - FILTER_FLAG_IPV6
         *                              - FILTER_FLAG_NO_PRIV_RANGE
         *                              - FILTER_FLAG_NO_RES_RANGE
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         *
         * @see https://www.php.net/manual/en/filter.filters.validate.php
         */
        return function ($flags = FILTER_FLAG_NONE): BoolObject {
            return bool(
                filter_var($this->object_value, FILTER_VALIDATE_IP, IntObject::unwrap($flags)) !== false
            );
        };
    }
}
