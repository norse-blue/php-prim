<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\int;

/**
 * Class StringLeftExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringLeftExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $length): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the left part of the string until the given length.
         *
         * @param int|IntObject $length
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($length): StringObject {
            return $this->substr(0, int($length)->abs()->value);
        };
    }
}
