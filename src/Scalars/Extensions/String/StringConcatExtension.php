<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringConcatExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringConcatExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject ...$strings): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Concatenates the given strings.
         *
         * @param string|StringObject ...$strings
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (...$strings): StringObject {
            $value = $this->object_value;
            foreach ($strings as $string) {
                $string = self::unwrap($string);

                $value .= $string;
            }

            return string($value);
        };
    }
}
