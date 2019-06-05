<?php

namespace NorseBlue\Prim\Tests\Helpers;

use NorseBlue\Prim\Types\ImmutableValueObject;

/**
 * @property mixed $mutable
 */
class ImmutableDummy extends ImmutableValueObject
{
    /** @var mixed Mutable value */
    protected $mutable;

    /**
     * Mutable property accessor.
     *
     * @return mixed
     */
    public function getMutableProperty()
    {
        return $this->mutable;
    }

    /**
     * Mutable property mutator.
     *
     * @param mixed $value
     */
    public function setMutableProperty($value): void
    {
        $this->mutable = $value;
    }
}
