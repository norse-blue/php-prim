<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringSubstrExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringSubstrExtension extends StringObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($start, $length = null): StringObject {
            $string = $this->object_value;
            $start = IntObject::unwrap($start);
            $length = IntObject::unwrap($length);

            return string(mb_substr($string, $start, $length, 'UTF-8'));
        };
    }
}
