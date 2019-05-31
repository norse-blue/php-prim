<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Scalars;

/**
 * Class IntObject
 *
 * @package NorseBlue\Prim\Types\Scalars
 */
class IntObject extends NumericObject
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
