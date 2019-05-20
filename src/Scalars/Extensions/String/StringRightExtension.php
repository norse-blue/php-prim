<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\int;
use function NorseBlue\Prim\string;

/**
 * Class StringRightExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringRightExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $length): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the right part of the string until the given length.
         *
         * @param int|IntObject $length
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($length): StringObject {
            $length = int($length);
            if ($length->equals(0)->isTrue()) {
                return string();
            }

            return $this->substr(-int($length)->abs()->value);
        };
    }
}
