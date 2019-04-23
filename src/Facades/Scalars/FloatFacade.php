<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;

/**
 * Class FloatFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 *
 * @method static FloatObject compare(int|FloatObject $value, int|IntObject|float|FloatObject $number)
 * @method static FloatObject equals(int|FloatObject $value, int|IntObject|float|FloatObject $number)
 */
class FloatFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = FloatObject::class;
}
