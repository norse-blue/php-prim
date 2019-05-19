<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Exceptions\Scalars\String\RegexMatchException;
use NorseBlue\Prim\ImmutableValueObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringRegexReplaceExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringRegexReplaceExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|array<string|StringObject> $pattern, string|StringObject|array<string|StringObject> $replacement, int|IntObject $limit = -1): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Perform a regular expression search and replace.
         *
         * @see https://www.php.net/manual/en/function.preg-replace.php
         *
         * @param string|StringObject|array $pattern
         * @param string|StringObject|array $replacement
         * @param int|IntObject $limit
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($pattern, $replacement, $limit = -1): StringObject {
            $pattern = ImmutableValueObject::unwrap($pattern);
            $replacement = ImmutableValueObject::unwrap($replacement);
            $limit = IntObject::unwrap($limit);

            $replaced = @preg_replace($pattern, $replacement, $this->object_value, $limit);
            if ($replaced === null) {
                throw new RegexMatchException(
                    preg_last_error(),
                    'An error occurred while trying to replace the values.'
                );
            }

            return string($replaced);
        };
    }
}
