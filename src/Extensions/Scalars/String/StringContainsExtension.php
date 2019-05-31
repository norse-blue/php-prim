<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class StringContainsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringContainsExtension extends StringObject implements ExtensionMethod
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
