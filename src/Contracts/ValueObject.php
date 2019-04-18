<?php

namespace NorseBlue\Prim\Contracts;

/**
 * Interface ValueObject
 *
 * @package NorseBlue\Prim\Contracts
 */
interface ValueObject
{
    /**
     * Check if the given value is valid for this object value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function valueIsValid($value): bool;
}
