<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\Numeric;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\NumericObject;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class NumericPadRightExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Numeric
 */
final class NumericPadRightExtension extends NumericObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $pad_length, string|StringObject $pad_string = '0'): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get a right padded string using the numeric value
         *
         * @param int|IntObject $pad_length
         * @param string|StringObject $pad_string
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($pad_length, $pad_string = '0'): StringObject {
            return $this->pad($pad_length, $pad_string, STR_PAD_RIGHT);
        };
    }
}
