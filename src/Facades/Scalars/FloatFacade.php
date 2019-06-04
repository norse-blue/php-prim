<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Types\Scalars\FloatObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;

/**
 * Facade to class FloatObject.
 *
 * @method static FloatObject abs(int|float|NumericObject $value)
 * @method static FloatObject compare(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static FloatObject create(int|float|NumericObject $value)
 * @method static FloatObject equals(int|float|NumericObject $value, int|float|NumericObject $number)
 */
final class FloatFacade extends NumericFacade
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $class = FloatObject::class;

    // endregion Properties
}
