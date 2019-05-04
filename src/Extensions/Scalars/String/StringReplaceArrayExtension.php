<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringReplaceArrayExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringReplaceArrayExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search, string[]|StringObject[] $replace): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Replace a given value in the string sequentially with an array.
         *
         * @param string|StringObject $search
         * @param string[]|StringObject[] $replace
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
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
