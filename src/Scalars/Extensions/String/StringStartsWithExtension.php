<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;
use function NorseBlue\Prim\string;

/**
 * Class StringStartsWithExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringStartsWithExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|array $needles): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Determine if a given string starts with a given substring.
         *
         * @param string|StringObject|array $needles
         *
         * @return BoolObject
         */
        return function ($needles): BoolObject {
            foreach ((array)$needles as $needle) {
                $needle = self::unwrap($needle);

                if (is_string($needle) && $needle !== ''
                    && $this->substr(0, string($needle)->length()->value)->equals($needle)->isTrue()
                ) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}
