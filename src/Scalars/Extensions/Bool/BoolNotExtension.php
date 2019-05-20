<?php

namespace NorseBlue\Prim\Scalars\Extensions\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use function NorseBlue\Prim\bool;

/**
 * Class BoolNotExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Bool
 */
final class BoolNotExtension extends BoolObject implements ExtensionMethod
{
    /**
     * @return callable(): BollObject
     */
    public function __invoke(): callable
    {
        /**
         * Apply the NOT logical operation.
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function (): BoolObject {
            return bool(!$this->object_value);
        };
    }
}
