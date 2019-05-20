<?php

namespace NorseBlue\Prim\Scalars\Extensions\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\NumericObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class NumericPadExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Numeric
 */
final class NumericPadExtension extends NumericObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($pad_length, $pad_string = '0', $pad_side = STR_PAD_BOTH): StringObject {
            return string(str_pad(
                $this->object_value,
                IntObject::unwrap($pad_length),
                StringObject::unwrap($pad_string),
                IntObject::unwrap($pad_side)
            ));
        };
    }
}
