<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;

/**
 * Class StringIsIpExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringIsIpExtension extends StringObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Scalars\BoolObject
         * @see https://www.php.net/manual/en/filter.filters.validate.php
         */
        return function ($flags = FILTER_FLAG_NONE): BoolObject {
            return bool(
                filter_var($this->object_value, FILTER_VALIDATE_IP, IntObject::unwrap($flags)) !== false
            );
        };
    }
}
