<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\int;
use function NorseBlue\Prim\Functions\string;

final class StringRightExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $length): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the right part of the string until the given length.
         *
         * @param int|IntObject $length
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($length): StringObject {
            $length = int($length);
            if ($length->equals(0)->isTrue()) {
                return string();
            }

            return $this->substr(-int($length)->abs()->value);
        };
    }
}
