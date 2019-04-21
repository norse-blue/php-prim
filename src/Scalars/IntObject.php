<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;

/**
 * Class IntObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class IntObject extends ImmutableValueObject
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

    /**
     * @inheritDoc
     */
    public function valueIsValid($value): bool
    {
        return is_int($value);
    }

    // endregion Overrides
}
