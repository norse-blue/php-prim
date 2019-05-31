<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringSurroundExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringSurroundExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $prefix, string|StringObject|null $suffix = null): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Begin a string with a single instance of a given value.
         *
         * @param string|StringObject $prefix
         * @param string|StringObject|null $suffix
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($prefix, $suffix = null): StringObject {
            $surrounded = $prefix . $this->object_value;

            $surrounded .= $suffix === null ? $prefix : $suffix;

            return string($surrounded);
        };
    }
}
