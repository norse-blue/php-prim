<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;
use function NorseBlue\Prim\int;

/**
 * Class StringCompareExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringCompareExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $string, bool|BoolObject $case_insensitive = false): IntObject
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given value.
         *
         * @param string|StringObject $string
         * @param bool|BoolObject $case_insensitive
         *
         * @return \NorseBlue\Prim\Scalars\IntObject
         */
        return function ($string, $case_insensitive = false): IntObject {
            $value = $this->object_value;
            $string = self::unwrap($string);
            $case_insensitive = bool($case_insensitive);

            return int($case_insensitive->isTrue() ? strcasecmp($value, $string) : strcmp($value, $string));
        };
    }
}
