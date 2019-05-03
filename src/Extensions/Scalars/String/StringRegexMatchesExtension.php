<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class StringMatchesExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringRegexMatchesExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $pattern, array &$matches = []): array
     */
    public function __invoke(): callable
    {
        /**
         * Match the string to a regex pattern.
         *
         * @param string|StringObject $pattern
         * @param int|IntObject $flags
         *
         * @return array
         */
        return function ($pattern, $flags = 0): array {
            $pattern = self::unwrap($pattern);

            preg_match($pattern, $this->object_value, $matches, IntObject::unwrap($flags));

            return $matches;
        };
    }
}
