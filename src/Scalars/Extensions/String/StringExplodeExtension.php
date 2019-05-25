<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class StringExplodeExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
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
            return explode($delimiter, $this->object_value, IntObject::unwrap($limit));
        };
    }
}
