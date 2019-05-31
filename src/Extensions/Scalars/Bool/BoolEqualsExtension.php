<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class BoolEqualsExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Bool
 */
final class BoolEqualsExtension extends BoolObject implements ExtensionMethod
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
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function ($bool): BoolObject {
            $bool = self::unwrap($bool);

            return bool($this->object_value === $bool);
        };
    }
}
