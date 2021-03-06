<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringReplaceLastExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search, string|StringObject $replace): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Replace the last occurrence of a given value in the string.
         *
         * @param string|StringObject $search
         * @param string|StringObject $replace
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($search, $replace): StringObject {
            $subject = $this->value;
            $search = self::unwrap($search);

            if ($search === '') {
                return string($subject);
            }

            $position = strrpos($subject, $search);

            if ($position !== false) {
                return string(substr_replace($subject, $replace, $position, strlen($search)));
            }

            return string($subject);
        };
    }
}
