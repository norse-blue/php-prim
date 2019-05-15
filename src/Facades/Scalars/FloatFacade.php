<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;

/**
 * Class FloatFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 *
 * @method static FloatObject abs(int|IntObject|float|FloatObject $value)
 * @method static FloatObject compare(int|IntObject|float|FloatObject $value, int|IntObject|float|FloatObject $number)
 * @method static FloatObject equals(int|IntObject|float|FloatObject $value, int|IntObject|float|FloatObject $number)
 * @method static BoolObject greaterThan(int|IntObject|float|FloatObject $value, int|IntObject|float|FloatObject $number)
 * @method static BoolObject greaterThanOrEqual(int|IntObject|float|FloatObject $value, int|IntObject|float|FloatObject $number)
 * @method static BoolObject lessThan(int|IntObject|float|FloatObject $value, int|IntObject|float|FloatObject $number)
 * @method static BoolObject lessThanOrEqual(int|IntObject|float|FloatObject $value, int|IntObject|float|FloatObject $number)
 */
class FloatFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = FloatObject::class;
}
