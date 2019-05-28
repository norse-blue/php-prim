<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\NumericObject;

/**
 * Class IntFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 *
 * @method static IntObject abs(int|IntObject $value)
 * @method static IntObject compare(int|IntObject $value, int|float|NumericObject $number)
 * @method static IntObject equals(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThan(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject greaterThanOrEqual(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThan(int|IntObject $value, int|float|NumericObject $number)
 * @method static BoolObject lessThanOrEqual(int|IntObject $value, int|float|NumericObject $number)
 */
final class IntFacade extends NumericFacade
{
    /** @inheritDoc */
    protected static $class = IntObject::class;
}
