<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\int;

/**
 * Class StringLengthExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
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
                $encoding = self::unwrap($encoding);

                return int(mb_strlen($value, $encoding));
            }

            return int(mb_strlen($value));
        };
    }
}
