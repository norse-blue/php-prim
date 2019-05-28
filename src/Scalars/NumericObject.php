<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;
use function NorseBlue\Prim\bool;

/**
 * Class NumericObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @method self abs() From extension method NumericAbsExtension
 * @method self compare(int|float|NumericObject $number) From extension method NumericCompareExtension
 * @method BoolObject equals(int|float|NumericObject $number) From extension method NumericEqualsExtension
 * @method BoolObject greaterThan(int|float|NumericObject $number) From extension method NumericGreaterThanExtension
 * @method BoolObject greaterThanOrEqual(int|float|NumericObject $number) From extension method NumericGreaterThanOrEqualExtension
 * @method BoolObject lessThan(int|float|NumericObject $number) From extension method NumericLessThanExtension
 * @method BoolObject lessThanOrEqual(int|float|NumericObject $number) From extension method NumericLessThanOrEqualExtension
 * @method StringObject pad(int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH) From extension method NumericPadExtension
 * @method StringObject padLeft(int|IntObject $pad_length, string|StringObject $pad_string = '0') From extension method NumericPadLeftExtension
 * @method StringObject padRight(int|IntObject $pad_length, string|StringObject $pad_string = '0') From extension method NumericPadRightExtension
 */
class NumericObject extends ImmutableValueObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * NumericObject constructor.
     *
     * @param int|float|NumericObject $value
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

    /**
     * Check if the numeric object is a float.
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function isFloat(): BoolObject
    {
        return bool(is_float($this->object_value));
    }

    /**
     * Check if the numeric object is an integer.
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function isInt(): BoolObject
    {
        return bool(is_int($this->object_value));
    }
}
