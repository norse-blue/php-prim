<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

final class StringLimitExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $limit = 100, string|StringObject $end = '...'): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Limit the number of characters in a string.
         *
         * @param int|IntObject $limit
         * @param string|StringObject $end
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($limit = 100, $end = '...'): StringObject {
            $value = $this->value;
            $limit = IntObject::unwrap($limit);
            $end = self::unwrap($end);

            if (mb_strwidth($value, 'UTF-8') <= $limit) {
                return string($value);
            }

            return string(rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end);
        };
    }
}
