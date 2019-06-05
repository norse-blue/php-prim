<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

final class StringExplodeExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $delimiter, int|IntObject|null $limit = null): array
     */
    public function __invoke(): callable
    {
        /**
         * Explode the string into an array.
         *
         * @param string|StringObject $delimiter
         * @param int|IntObject|null $limit
         *
         * @return array
         */
        return function ($delimiter, $limit = PHP_INT_MAX): array {
            return explode($delimiter, $this->value, IntObject::unwrap($limit));
        };
    }
}
