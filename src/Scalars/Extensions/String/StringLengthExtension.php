<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\int;

/**
 * Class StringLengthExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringLengthExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $encoding = null): IntObject
     */
    public function __invoke(): callable
    {
        /**
         * Return the length of the given string.
         *
         * @param string|StringObject $encoding
         *
         * @return IntObject
         */
        return function ($encoding = null): IntObject {
            $value = $this->object_value;

            if ($encoding) {
                $encoding = static::unwrap($encoding);

                return int(mb_strlen($value, $encoding));
            }

            return int(mb_strlen($value));
        };
    }
}
