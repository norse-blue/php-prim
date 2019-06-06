<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Enums\Enum;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Enums\Enum;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class EnumEqualsExtension
 *
 * @package NorseBlue\Prim\Enums\Extensions
 */
class EnumEqualsExtension extends Enum implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject|string|StringObject|\NorseBlue\Prim\Types\Enums\Enum|null): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Check if the given value is equal to the enum value.
         *
         * @param int|IntObject|string|StringObject|\NorseBlue\Prim\Types\Enums\Enum|null $enum
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function ($enum): BoolObject {
            $enum = self::unwrap($enum);

            return bool($this->value === $enum);
        };
    }
}
