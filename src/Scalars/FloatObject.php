<?php

namespace NorseBlue\Prim\Scalars;

/**
 * Class FloatObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @method self abs() From extension method FloatAbsExtension
 * @method self compare(int|IntObject|float|FloatObject $number) From extension method FloatCompareExtension
 * @method BoolObject equals(int|IntObject|float|FloatObject $number) From extension method FloatEqualsExtension
 * @method BoolObject greaterThan(int|IntObject|float|FloatObject $number) From extension method FloatGreaterThanExtension
 * @method BoolObject greaterThanOrEqual(int|IntObject|float|FloatObject $number) From extension method FloatGreaterThanOrEqualExtension
 * @method BoolObject lessThan(int|IntObject|float|FloatObject $number) From extension method FloatLessThanExtension
 * @method BoolObject lessThanOrEqual(int|IntObject|float|FloatObject $number) From extension method FloatLessThanOrEqualExtension
 */
class FloatObject extends NumericObject
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

    // endregion Overrides
}
