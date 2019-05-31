<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringUpperExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringUpperExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to upper-case.
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function (): StringObject {
            $value = $this->object_value;

            return string(mb_strtoupper($value, 'UTF-8'));
        };
    }
}
