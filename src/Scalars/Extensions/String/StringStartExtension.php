<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringStartExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringStartExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $prefix): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Begin a string with a single instance of a given value.
         *
         * @param string|StringObject $prefix
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($prefix): StringObject {
            $value = $this->object_value;
            $prefix = self::unwrap($prefix);
            $quoted = preg_quote($prefix, '/');

            return string($prefix . preg_replace('/^(?:' . $quoted . ')+/u', '', $value));
        };
    }
}
