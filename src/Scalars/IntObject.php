<?php

namespace NorseBlue\Prim\Scalars;

/**
 * Class IntObject
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
class IntObject extends NumericObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * IntObject constructor.
     *
     * @param int|IntObject|float|FloatObject $value
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
