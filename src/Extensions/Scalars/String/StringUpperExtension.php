<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringUpperExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringUpperExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable()
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to upper-case.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            $value = $this->object_value;

            return string(mb_strtoupper($value, 'UTF-8'));
        };
    }
}
