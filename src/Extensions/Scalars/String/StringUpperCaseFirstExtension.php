<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Class StringUpperCaseFirstExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringUpperCaseFirstExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Make a string's first character uppercase.
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function (): StringObject {
            return $this->substr(0, 1)->upper()->concat($this->substr(1));
        };
    }
}
