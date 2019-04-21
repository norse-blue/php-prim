<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ValueObject;

/**
 * Class BoolObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class BoolObject extends ValueObject
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

    // endregion Overrides
}
