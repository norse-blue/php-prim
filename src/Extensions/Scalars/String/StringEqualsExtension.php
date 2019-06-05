<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

final class StringEqualsExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $string, bool|BoolObject $case_insensitive = false): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given value for equality.
         *
         * @param string|StringObject $string
         * @param bool|BoolObject $case_insensitive
         *
         * @return BoolObject
         */
        return function ($string, $case_insensitive = false): BoolObject {
            return $this->compare($string, $case_insensitive)->equals(0);
        };
    }
}
