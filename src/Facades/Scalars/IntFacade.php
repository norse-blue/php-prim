<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Facade to class IntObject.
 *
 * @method static IntObject abs(int|IntObject $value)
 * @method static IntObject compare(int|IntObject $value, int|float|NumericObject $number)
 * @method static IntObject create(int|IntObject $value)
 * @method static IntObject equals(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThan(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThanOrEqual(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThan(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThanOrEqual(int|IntObject $value, int|float|NumericObject $number)
 * @method static StringObject pad(int|IntObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH)
 * @method static StringObject padLeft(int|IntObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0')
 * @method static StringObject padRight(int|IntObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0')
 */
final class IntFacade extends NumericFacade
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $class = IntObject::class;

    // endregion Properties
}
