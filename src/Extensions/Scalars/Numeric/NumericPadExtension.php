<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class NumericPadExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Numeric
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
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($pad_length, $pad_string = '0', $pad_side = STR_PAD_BOTH): StringObject {
            return string(str_pad(
                (string)$this->object_value,
                IntObject::unwrap($pad_length),
                StringObject::unwrap($pad_string),
                IntObject::unwrap($pad_side)
            ));
        };
    }
}
