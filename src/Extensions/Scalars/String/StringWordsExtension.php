<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringWordsExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $words = 100, string|StringObject $end = '...'): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Limit the number of words in a string.
         *
         * @param int|IntObject $words
         * @param string|StringObject $end
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($words = 100, $end = '...'): StringObject {
            $value = $this->value;
            $words = IntObject::unwrap($words);

            preg_match('/^\s*+(?:\S++\s*+){1,' . $words . '}/u', $value, $matches);

            if (!isset($matches[0]) || string($value)->length()->equals(string($matches[0])->length())->isTrue()) {
                return string($value);
            }

            $end = self::unwrap($end);

            return string(rtrim($matches[0]) . $end);
        };
    }
}
