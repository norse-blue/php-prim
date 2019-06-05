<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringStartExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $prefix): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Begin a string with a single instance of a given value.
         *
         * @param string|StringObject $prefix
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($prefix): StringObject {
            $value = $this->value;
            $prefix = self::unwrap($prefix);
            $quoted = preg_quote($prefix, '/');

            return string($prefix . preg_replace('/^(?:' . $quoted . ')+/u', '', $value));
        };
    }
}
