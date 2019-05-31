<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class BoolNotExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Bool
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
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function (): BoolObject {
            return bool(!$this->object_value);
        };
    }
}
