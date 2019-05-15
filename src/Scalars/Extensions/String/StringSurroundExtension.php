<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringSurroundExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringSurroundExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $prefix, string|StringObject|null $suffix = null): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Begin a string with a single instance of a given value.
         *
         * @param string|StringObject $prefix
         * @param string|StringObject|null $suffix
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($prefix, $suffix = null): StringObject {
            $surrounded = $prefix . $this->object_value;

            $surrounded .= ($suffix === null) ? $prefix : $suffix;

            return string($surrounded);
        };
    }
}
