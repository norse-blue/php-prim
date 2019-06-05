<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringLowerExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to lower-case.
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function (): StringObject {
            $value = $this->value;

            return string(mb_strtolower($value, 'UTF-8'));
        };
    }
}
