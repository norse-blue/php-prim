<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringPrefixExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringPrefixExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $prefix): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Prefix the string with the given value.
         *
         * @param string|StringObject $prefix
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($prefix): StringObject {
            return string($prefix . $this->object_value);
        };
    }
}
