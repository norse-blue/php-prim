<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;

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
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($flags = FILTER_FLAG_NONE): BoolObject {
            return bool(
                filter_var($this->value, FILTER_VALIDATE_URL, IntObject::unwrap($flags)) !== false
            );
        };
    }
}
