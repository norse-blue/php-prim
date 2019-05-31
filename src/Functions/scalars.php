<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Functions;

use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\FloatObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Create a new BoolObject.
 *
 * @param bool|BoolObject $value
 *
 * @return \NorseBlue\Prim\Types\Scalars\BoolObject
 */
function bool($value = false): BoolObject
{
    return new BoolObject($value);
}

/**
 * Create a new FloatObject.
 *
 * @param int|float|NumericObject $value
 *
 * @return \NorseBlue\Prim\Types\Scalars\FloatObject
 */
function float($value = 0.0): FloatObject
{
    return new FloatObject($value);
}

/**
 * Create a new IntObject.
 *
 * @param int|IntObject $value
 *
 * @return \NorseBlue\Prim\Types\Scalars\IntObject
 */
function int($value = 0): IntObject
{
    return new IntObject($value);
}

/**
 * Create a new NumericObject.
 *
 * @param int|float|NumericObject $value
 *
 * @return \NorseBlue\Prim\Types\Scalars\NumericObject
 */
function numeric($value = 0): NumericObject
{
    if (is_float($value)) {
        return new FloatObject($value);
    }

    return new IntObject($value);
}

/**
 * Create a new StringObject.
 *
 * @param string|StringObject $value
 *
 * @return \NorseBlue\Prim\Types\Scalars\StringObject
 */
function string($value = ''): StringObject
{
    return new StringObject($value);
}
