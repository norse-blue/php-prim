<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringReplaceArrayExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search, array<string|StringObject> $replace): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Replace a given value in the string sequentially with an array.
         *
         * @param string|StringObject $search
         * @param array<string|StringObject> $replace
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($search, array $replace): StringObject {
            $subject = $this;

            foreach ($replace as $value) {
                $value = self::unwrap($value);

                $subject = $subject->replaceFirst($search, $value);
            }

            return string($subject);
        };
    }
}
