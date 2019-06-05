<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Scalars;

use NorseBlue\Prim\Types\ValueObject;

/**
 * Primitive type float as object.
 */
class FloatObject extends NumericObject
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $extensions = [];

    /** @var array<string> The guarded extension methods. */
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

    // endregion Properties

    // region === Overrides ===

    /**
     * @param int|float|NumericObject $value
     */
    public function __construct($value = 0.0)
    {
        if ($this->valueIsValid($value)) {
            $value = (float)$value;
        }

        parent::__construct($value);
    }

    /**
     * @param int|float|NumericObject $value
     *
     * @return self
     */
    public static function create($value = 0.0): ValueObject
    {
        return new static($value);
    }

    // endregion Overrides
}
