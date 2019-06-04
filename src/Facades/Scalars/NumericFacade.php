<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Facade to class NumericObject.
 *
 * @method static NumericObject abs(int|float|NumericObject $value)
 * @method static NumericObject compare(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static NumericObject create(int|float|NumericObject $value)
 * @method static NumericObject equals(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThan(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThanOrEqual(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThan(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThanOrEqual(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static StringObject pad(int|float|NumericObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH)
 * @method static StringObject padLeft(int|float|NumericObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0')
 * @method static StringObject padRight(int|float|NumericObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0')
 */
class NumericFacade extends ValueObjectFacade
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $class = NumericObject::class;

    // endregion Properties
}
