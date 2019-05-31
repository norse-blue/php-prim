<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Class StringPadRightExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringPadRightExtension extends StringObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($pad_length, $pad_string = ' '): StringObject {
            return $this->pad($pad_length, $pad_string, STR_PAD_RIGHT);
        };
    }
}
