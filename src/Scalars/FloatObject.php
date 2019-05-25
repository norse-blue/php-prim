<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars;

/**
 * Class FloatObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class FloatObject extends NumericObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * FloatObject constructor.
     *
     * @param int|float|NumericObject $value
     */
    public function __construct($value = 0.0)
    {
        if ($this->valueIsValid($value)) {
            $value = (float)$value;
        }

        parent::__construct($value);
    }

    // endregion Overrides
}
