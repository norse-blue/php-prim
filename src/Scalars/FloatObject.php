<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ValueObject;

/**
 * Class FloatObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class FloatObject extends ValueObject
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

    // endregion Overrides
}
