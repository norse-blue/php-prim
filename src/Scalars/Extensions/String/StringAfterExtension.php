<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringAfterExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringAfterExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Return the remainder of the value after a given value.
         *
         * @param string|StringObject $search
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($search): StringObject {
            $value = $this->object_value;
            $search = self::unwrap($search);

            return string($search === '' ? $value : array_reverse(explode($search, $value, 2))[0]);
        };
    }
}
