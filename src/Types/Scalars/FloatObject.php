<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Scalars;

/**
 * Class FloatObject
 *
 * @package NorseBlue\Prim\Types\Scalars
 */
class FloatObject extends NumericObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    /** @inheritDoc */
    protected static $guarded_extensions = [
        'abs',
        'compare',
        'equals',
        'greaterThan',
        'greaterThanOrEqual',
        'lessThan',
        'lessThanOrEqual',
        'pad',
        'padLeft',
        'padRight',
    ];

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
