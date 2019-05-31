<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\ImmutableValueObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Class StringRemoveExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringRemoveExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject|array<string|StringObject> $remove): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Remove part(s) of the string.
         *
         * @param string|StringObject|array<string|StringObject> $remove
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($remove): StringObject {
            $remove = ImmutableValueObject::unwrap($remove);

            $removed = is_array($remove) ? $this->regexReplace('#(' . implode('|', $remove) . ')#', '') : $this;

            return $removed->replace($remove, '')->trim();
        };
    }
}
