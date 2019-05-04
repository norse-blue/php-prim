<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;
use function NorseBlue\Prim\string;

/**
 * Class StringIsExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringIsExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|array $patterns): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Determine if a given string matches the given patterns.
         *
         * @param string|StringObject|array $patterns
         *
         * @return BoolObject
         */
        return function ($patterns): BoolObject {
            if (!is_array($patterns)) {
                $patterns = [$patterns];
            }

            foreach ($patterns as $pattern) {
                $pattern = self::unwrap($pattern);

                // If the given value is an exact match we can of course return true right
                // from the beginning. Otherwise, we will translate asterisks and do an
                // actual pattern match against the two strings to see if they match.
                if ($this->equals($pattern)->isTrue()) {
                    return bool(true);
                }

                $pattern = string(preg_quote($pattern, '#'));

                // Asterisks are translated into zero-or-more regular expression wildcards
                // to make it convenient to check if the strings starts with the given
                // pattern such as "library/*", making any string check convenient.
                $pattern = $pattern->replace('\*', '.*');
                if (count($this->regexMatches('#^' . $pattern . '\z#u')) > 0) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}
