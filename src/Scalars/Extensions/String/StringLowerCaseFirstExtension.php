<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class StringLowerCaseFirstExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringLowerCaseFirstExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Make a string's first character lowercase.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            return $this->substr(0, 1)->lower()->concat($this->substr(1));
        };
    }
}
