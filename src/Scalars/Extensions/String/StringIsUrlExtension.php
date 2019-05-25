<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;

/**
 * Class StringIsUrlExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringIsUrlExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $flags = FILTER_FLAG_NONE): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is an url.
         *
         * @param int|IntObject $flags Allowed flags:
         *                              - FILTER_FLAG_SCHEME_REQUIRED
         *                              - FILTER_FLAG_HOST_REQUIRED
         *                              - FILTER_FLAG_PATH_REQUIRED
         *                              - FILTER_FLAG_QUERY_REQUIRED
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($flags = FILTER_FLAG_NONE): BoolObject {
            return bool(
                filter_var($this->object_value, FILTER_VALIDATE_URL, IntObject::unwrap($flags)) !== false
            );
        };
    }
}
