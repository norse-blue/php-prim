<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ValueObject;

/**
 * Class IntObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class IntObject extends ValueObject
{
    // region === Overrides ===

    /**
     * IntObject constructor.
     *
     * @param int |IntObject $value
     */
    public function __construct($value = 0)
    {
        parent::__construct($value);
    }

    // endregion Overrides
}
