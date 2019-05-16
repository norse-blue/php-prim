<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\NumericObject;

/**
 * Class NumericFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 *
 * @method static NumericObject abs(int|float|NumericObject $value)
 * @method static NumericObject compare(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static NumericObject equals(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThan(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThanOrEqual(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThan(int|float|NumericObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThanOrEqual(int|float|NumericObject $value, int|float|NumericObject $number)
 */
class NumericFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = NumericObject::class;
}
