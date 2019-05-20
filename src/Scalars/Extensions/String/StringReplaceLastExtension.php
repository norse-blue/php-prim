<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringReplaceLastExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringReplaceLastExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search, string|StringObject $replace): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Replace the last occurrence of a given value in the string.
         *
         * @param string|StringObject $search
         * @param string|StringObject $replace
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($search, $replace): StringObject {
            $subject = $this->object_value;
            $search = self::unwrap($search);

            if ($search === '') {
                return string($subject);
            }

            $position = strrpos($subject, $search);

            if ($position !== false) {
                return string(substr_replace($subject, $replace, $position, strlen($search)));
            }

            return string($subject);
        };
    }
}
