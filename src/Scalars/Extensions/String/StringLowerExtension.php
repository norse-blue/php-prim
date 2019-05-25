<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringLowerExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringLowerExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to lower-case.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            $value = $this->object_value;

            return string(mb_strtolower($value, 'UTF-8'));
        };
    }
}
