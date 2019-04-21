<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;

/**
 * Class BoolObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class BoolObject extends ImmutableValueObject
{
    // region === Overrides ===

    /**
     * BoolObject constructor.
     *
     * @param bool|BoolObject $value
     */
    public function __construct($value = false)
    {
        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    public function valueIsValid($value): bool
    {
        return is_bool($value);
    }

    // endregion Overrides
}
