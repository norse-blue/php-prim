<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringEndsWithExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringEndsWithExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|array $needles): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Determine if the value ends with a given substring.
         *
         * @param string|StringObject|array $needles
         *
         * @return BoolObject
         */
        return function ($needles): BoolObject {
            foreach ((array)$needles as $needle) {
                $needle = self::unwrap($needle);

                if (is_string($needle) && $needle !== ''
                    && $this->substr(-string($needle)->length()->value)->equals($needle)->isTrue()
                ) {
                    return bool(true);
                }
            }

            return bool(false);
        };
    }
}
