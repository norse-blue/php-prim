<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringStudlyExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringStudlyExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable()
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to studly caps case.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            $value = $this->object_value;
            $value = ucwords(str_replace(['-', '_'], ' ', $value));

            return string(str_replace(' ', '', $value));
        };
    }
}
