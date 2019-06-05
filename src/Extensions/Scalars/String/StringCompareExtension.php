<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;
use function NorseBlue\Prim\Functions\int;

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
         * @return \NorseBlue\Prim\Types\Scalars\IntObject
         */
        return function ($string, $case_insensitive = false): IntObject {
            $value = $this->value;
            $string = self::unwrap($string);
            $case_insensitive = bool($case_insensitive);

            return int($case_insensitive->isTrue() ? strcasecmp($value, $string) : strcmp($value, $string));
        };
    }
}
