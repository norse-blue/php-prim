<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;

/**
 * Class FloatObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class FloatObject extends ImmutableValueObject
{
    // region === Overrides ===

    /**
     * FloatObject constructor.
     *
     * @param float|FloatObject $value
     */
    public function __construct($value = 0.0)
    {
        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_float($value);
    }

    // endregion Overrides
}
