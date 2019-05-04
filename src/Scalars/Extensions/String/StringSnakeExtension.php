<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringSnakeExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringSnakeExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $delimiter): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Convert a string to snake case.
         *
         * @param string|StringObject $delimiter
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($delimiter = '_'): StringObject {
            $value = $this->object_value;

            if (!ctype_lower($value)) {
                $delimiter = self::unwrap($delimiter);

                $value = preg_replace('/\s+/u', '', ucwords($value));
                $value = preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value);
                return string($value)->lower();
            }

            return string($value);
        };
    }
}
