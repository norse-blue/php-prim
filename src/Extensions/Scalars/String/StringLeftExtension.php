<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\int;

final class StringLeftExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $length): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the left part of the string until the given length.
         *
         * @param int|IntObject $length
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($length): StringObject {
            return $this->substr(0, int($length)->abs()->value);
        };
    }
}
