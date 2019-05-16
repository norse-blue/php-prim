<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;

/**
 * Class NumericObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @method self abs() From extension method IntAbsExtension
 * @method self compare(int|IntObject|float|FloatObject $number) From extension method IntCompareExtension
 * @method BoolObject equals(int|IntObject|float|FloatObject $number) From extension method IntEqualsExtension
 * @method BoolObject greaterThan(int|IntObject|float|FloatObject $number) From extension method IntGreaterThanExtension
 * @method BoolObject greaterThanOrEqual(int|IntObject|float|FloatObject $number) From extension method IntGreaterThanOrEqualExtension
 * @method BoolObject lessThan(int|IntObject|float|FloatObject $number) From extension method IntLessThanExtension
 * @method BoolObject lessThanOrEqual(int|IntObject|float|FloatObject $number) From extension method IntLessThanOrEqualExtension
 */
class NumericObject extends ImmutableValueObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * NumericObject constructor.
     *
     * @param int|IntObject|float|FloatObject $value
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
        return is_int($value) || is_float($value);
    }

    // endregion Overrides
}
