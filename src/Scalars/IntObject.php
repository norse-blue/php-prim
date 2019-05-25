<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars;

/**
 * Class IntObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class IntObject extends NumericObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * IntObject constructor.
     *
     * @param int|float|NumericObject $value
     */
    public function __construct($value = 0)
    {
        if ($this->valueIsValid($value)) {
            $value = (int)$value;
        }

        parent::__construct($value);
    }

    // endregion Overrides
}
