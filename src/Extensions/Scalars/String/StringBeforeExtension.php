<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringBeforeExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringBeforeExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $search): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the portion of the value before a given value.
         *
         * @param string|StringObject $search
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($search): StringObject {
            $value = $this->object_value;
            $search = self::unwrap($search);

            return string($search === '' ? $value : explode($search, $value)[0]);
        };
    }
}
