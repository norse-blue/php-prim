<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Scalars;

use NorseBlue\Prim\Types\ImmutableValueObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class NumericObject
 *
 * @package NorseBlue\Prim\Types\Scalars
 *
 * @method self abs()
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericAbsExtension
 * @method self compare(int|float|NumericObject $number)
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericCompareExtension
 * @method BoolObject equals(int|float|NumericObject $number)
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericEqualsExtension
 * @method BoolObject greaterThan(int|float|NumericObject $number)
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericGreaterThanExtension
 * @method BoolObject greaterThanOrEqual(int|float|NumericObject $number)
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericGreaterThanOrEqualExtension
 * @method BoolObject lessThan(int|float|NumericObject $number)
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericLessThanExtension
 * @method BoolObject lessThanOrEqual(int|float|NumericObject $number)
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericLessThanOrEqualExtension
 * @method StringObject pad(int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH)
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericPadExtension
 * @method StringObject padLeft(int|IntObject $pad_length, string|StringObject $pad_string = '0')
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericPadLeftExtension
 * @method StringObject padRight(int|IntObject $pad_length, string|StringObject $pad_string = '0')
 * @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericPadRightExtension
 */
class NumericObject extends ImmutableValueObject
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
     * @return \NorseBlue\Prim\Types\Scalars\BoolObject
     */
    public function isFloat(): BoolObject
    {
        return bool(is_float($this->object_value));
    }

    /**
     * Check if the numeric object is an integer.
     *
     * @return \NorseBlue\Prim\Types\Scalars\BoolObject
     */
    public function isInt(): BoolObject
    {
        return bool(is_int($this->object_value));
    }
}
