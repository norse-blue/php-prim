<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class StringCamelExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringCamelExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable()
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to camel case.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            return $this->studly()->lcfirst();
        };
    }
}
