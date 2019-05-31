<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringFinishExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringFinishExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $cap): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Cap the value with a single instance of a given value.
         *
         * @param string|StringObject $cap
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($cap): StringObject {
            $value = $this->object_value;
            $cap = self::unwrap($cap);

            $quoted = preg_quote($cap, '/');

            return string(preg_replace('/(?:' . $quoted . ')+$/u', '', $value) . $cap);
        };
    }
}
