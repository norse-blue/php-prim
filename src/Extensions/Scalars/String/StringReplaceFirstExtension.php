<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringReplaceFirstExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringReplaceFirstExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search, string|StringObject $replace)
     */
    public function __invoke(): callable
    {
        /**
         * Replace the first occurrence of a given value in the string.
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

            $position = strpos($subject, $search);

            if ($position !== false) {
                $replace = self::unwrap($replace);

                return string(substr_replace($subject, $replace, $position, strlen($search)));
            }

            return string($subject);
        };
    }
}
