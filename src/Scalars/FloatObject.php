<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;

/**
 * Class FloatObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @method self compare(int|IntObject|float|FloatObject $number) From extension method FloatCompareExtension
 * @method BoolObject equals(int|IntObject|float|FloatObject $number) From extension method FloatEqualsExtension
 * @method BoolObject greaterThan(int|IntObject|float|FloatObject $number) From extension method FloatGreaterThanExtension
 * @method BoolObject greaterThanOrEqual(int|IntObject|float|FloatObject $number) From extension method FloatGreaterThanOrEqualExtension
 * @method BoolObject lessThan(int|IntObject|float|FloatObject $number) From extension method FloatLessThanExtension
 * @method BoolObject lessThanOrEqual(int|IntObject|float|FloatObject $number) From extension method FloatLessThanOrEqualExtension
 */
class FloatObject extends ImmutableValueObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * FloatObject constructor.
     *
     * @param float|FloatObject|int|IntObject $value
     */
    public function __construct($value = 0.0)
    {
        if ($this->valueIsValid($value)) {
            $value = (float)$value;
        }

        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_float($value) || is_int($value);
    }

    // endregion Overrides
}
