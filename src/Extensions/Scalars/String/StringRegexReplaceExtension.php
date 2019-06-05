<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Exceptions\Scalars\String\RegexMatchException;
use NorseBlue\Prim\Types\ImmutableValueObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringRegexReplaceExtension extends StringObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($pattern, $replacement, $limit = -1): StringObject {
            $pattern = ImmutableValueObject::unwrap($pattern);
            $replacement = ImmutableValueObject::unwrap($replacement);
            $limit = IntObject::unwrap($limit);

            $replaced = @preg_replace($pattern, $replacement, $this->value, $limit);
            if ($replaced === null) {
                // @codeCoverageIgnoreStart
                throw new RegexMatchException(
                    preg_last_error(),
                    'An error occurred while trying to replace the values.'
                );
                // @codeCoverageIgnoreEnd
            }

            return string($replaced);
        };
    }
}
