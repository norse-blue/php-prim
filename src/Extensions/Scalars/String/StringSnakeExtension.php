<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringSnakeExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $delimiter): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Convert a string to snake case.
         *
         * @param string|StringObject $delimiter
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($delimiter = '_'): StringObject {
            $value = $this->value;

            if (!ctype_lower($value)) {
                $delimiter = self::unwrap($delimiter);

                $value = preg_replace('/\s+/u', '', ucwords($value));
                $value = preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value);

                return string($value)->lower();
            }

            return string($value);
        };
    }
}
