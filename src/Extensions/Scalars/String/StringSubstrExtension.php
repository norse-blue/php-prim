<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringSubstrExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $start, int|IntObject|null $length = null): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Returns the portion of string specified by the start and length parameters.
         *
         * @param int|IntObject $start
         * @param int|IntObject|null $length
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($start, $length = null): StringObject {
            $string = $this->value;
            $start = IntObject::unwrap($start);
            $length = IntObject::unwrap($length);

            return string(mb_substr($string, $start, $length, 'UTF-8'));
        };
    }
}
