<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Scalars;

use NorseBlue\Prim\Types\ImmutableValueObject;
use NorseBlue\Prim\Types\ValueObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Primitive type numeric as object.
 *
 * @method self abs() @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericAbsExtension
 * @method self compare(int|float|NumericObject $number) @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericCompareExtension
 * @method BoolObject equals(int|float|NumericObject $number) @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericEqualsExtension
 * @method BoolObject greaterThan(int|float|NumericObject $number) @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericGreaterThanExtension
 * @method BoolObject greaterThanOrEqual(int|float|NumericObject $number) @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericGreaterThanOrEqualExtension
 * @method BoolObject lessThan(int|float|NumericObject $number) @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericLessThanExtension
 * @method BoolObject lessThanOrEqual(int|float|NumericObject $number) @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericLessThanOrEqualExtension
 * @method StringObject pad(int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH) @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericPadExtension
 * @method StringObject padLeft(int|IntObject $pad_length, string|StringObject $pad_string = '0') @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericPadLeftExtension
 * @method StringObject padRight(int|IntObject $pad_length, string|StringObject $pad_string = '0') @see \NorseBlue\Prim\Extensions\Scalars\Numeric\NumericPadRightExtension
 */
class NumericObject extends ImmutableValueObject
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
    public function __construct($value = 0)
    {
        parent::__construct($value);
    }

    /**
     * @param int|float|NumericObject $value
     *
     * @return self
     */
    public static function create($value = 0): ValueObject
    {
        return new static($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_int($value) || is_float($value);
    }

    // endregion Overrides

    // region === Methods ===

    /**
     * Check if the numeric object is a float.
     *
     * @return \NorseBlue\Prim\Types\Scalars\BoolObject
     */
    final public function isFloat(): BoolObject
    {
        return bool(is_float($this->value));
    }

    /**
     * Check if the numeric object is an integer.
     *
     * @return \NorseBlue\Prim\Types\Scalars\BoolObject
     */
    final public function isInt(): BoolObject
    {
        return bool(is_int($this->value));
    }

    /**
     * Check if the numeric value is zero.
     *
     * @return \NorseBlue\Prim\Types\Scalars\BoolObject
     */
    final public function isZero(): BoolObject
    {
        return bool($this->value === 0 || $this->value === 0.0);
    }

    // endregion
}
