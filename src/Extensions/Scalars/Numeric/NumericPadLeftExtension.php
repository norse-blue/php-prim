<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Class NumericPadLeftExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Numeric
 */
final class NumericPadLeftExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $pad_length, string|StringObject $pad_string = '0'): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get a left padded string using the numeric value.
         *
         * @param int|IntObject $pad_length
         * @param string|StringObject $pad_string
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($pad_length, $pad_string = '0'): StringObject {
            return $this->pad($pad_length, $pad_string, STR_PAD_LEFT);
        };
    }
}
