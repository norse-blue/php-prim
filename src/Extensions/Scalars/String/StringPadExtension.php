<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringPadExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringPadExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get a padded string using the numeric value.
         *
         * @param int|IntObject $pad_length
         * @param string|StringObject $pad_string
         * @param int|IntObject $pad_side
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($pad_length, $pad_string = ' ', $pad_side = STR_PAD_BOTH): StringObject {
            return string(str_pad(
                $this->object_value,
                IntObject::unwrap($pad_length),
                StringObject::unwrap($pad_string),
                IntObject::unwrap($pad_side)
            ));
        };
    }
}
