<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;

/**
 * Class StringIsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringIsExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|array $patterns)
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
            $value = $this->object_value;
            if (!is_array($patterns)) {
                $patterns = [$patterns];
            }

            foreach ($patterns as $pattern) {
                $pattern = self::unwrap($pattern);

                // If the given value is an exact match we can of course return true right
                // from the beginning. Otherwise, we will translate asterisks and do an
                // actual pattern match against the two strings to see if they match.
                if ($pattern === $value) {
                    return bool(true);
                }

                $pattern = preg_quote($pattern, '#');

                // Asterisks are translated into zero-or-more regular expression wildcards
                // to make it convenient to check if the strings starts with the given
                // pattern such as "library/*", making any string check convenient.
                $pattern = str_replace('\*', '.*', $pattern);
                if (preg_match('#^' . $pattern . '\z#u', $value) === 1) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}
