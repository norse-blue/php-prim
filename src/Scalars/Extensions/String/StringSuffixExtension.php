<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringSuffixExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringSuffixExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $suffix): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Prefix the string with the given value.
         *
         * @param string|StringObject $suffix
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($suffix): StringObject {
            return string($this->object_value . $suffix);
        };
    }
}
