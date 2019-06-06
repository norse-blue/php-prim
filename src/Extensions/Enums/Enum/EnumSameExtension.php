<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Enums\Enum;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Enums\Enum;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class EnumSameExtension
 *
 * @package NorseBlue\Prim\Enums\Extensions
 */
class EnumSameExtension extends Enum implements ExtensionMethod
{
    /**
     * @return callable(Enum $enum): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if the given value is the same enum value.
         *
         * @param \NorseBlue\Prim\Types\Enums\Enum $enum
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function (Enum $enum): BoolObject {
            if (!$enum instanceof static) {
                return bool(false);
            }

            return $this->equals($enum->value);
        };
    }
}
