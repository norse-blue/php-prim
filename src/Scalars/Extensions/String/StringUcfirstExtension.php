<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class StringUcfirstExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringUcfirstExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Make a string's first character uppercase.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            return $this->substr(0, 1)->upper()->concat($this->substr(1));
        };
    }
}
