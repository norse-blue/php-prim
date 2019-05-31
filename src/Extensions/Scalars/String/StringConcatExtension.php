<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringConcatExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringConcatExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject ...$strings): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Concatenates the given strings.
         *
         * @param string|StringObject ...$strings
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function (...$strings): StringObject {
            $value = $this->object_value;
            foreach ($strings as $string) {
                $string = self::unwrap($string);

                $value .= $string;
            }

            return string($value);
        };
    }
}
