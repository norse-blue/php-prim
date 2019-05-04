<?php

namespace NorseBlue\Prim\Extensions\Scalars\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use function NorseBlue\Prim\bool;

/**
 * Class BoolEqualsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Bool
 */
class BoolEqualsExtension extends BoolObject implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolObject $bool): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Compare the object against a given value for equality.
         *
         * @param bool|BoolObject $bool
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function ($bool): BoolObject {
            $bool = self::unwrap($bool);

            return bool($this->object_value === $bool);
        };
    }
}
