<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;

/**
 * Class StringContainsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringContainsExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|array $needles): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Determine if a given string contains a given substring.
         *
         * @param string|StringObject|array $needles
         *
         * @return BoolObject
         */
        return function ($needles): BoolObject {
            $haystack = $this->object_value;

            foreach ((array)$needles as $needle) {
                $needle = self::unwrap($needle);

                if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}
