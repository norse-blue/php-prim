<?php

namespace NorseBlue\Prim;

use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\NumericObject;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * BoolObject helper function
 */
if (!function_exists('bool')) {
    /**
     * Create a new BoolObject.
     *
     * @param bool|BoolObject $value
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    function bool($value = false): BoolObject
    {
        return new BoolObject($value);
    }
}

/**
 * FloatObject helper function
 */
if (!function_exists('float')) {
    /**
     * Create a new FloatObject.
     *
     * @param int|float|NumericObject $value
     *
     * @return \NorseBlue\Prim\Scalars\FloatObject
     */
    function float($value = 0.0): FloatObject
    {
        return new FloatObject($value);
    }
}

/**
 * IntObject helper function
 */
if (!function_exists('int')) {
    /**
     * Create a new IntObject.
     *
     * @param int|IntObject $value
     *
     * @return \NorseBlue\Prim\Scalars\IntObject
     */
    function int($value = 0): IntObject
    {
        return new IntObject($value);
    }
}

/**
 * NumericObject helper function
 */
if (!function_exists('numeric')) {
    /**
     * Create a new NumericObject.
     *
     * @param int|float|NumericObject $value
     *
     * @return \NorseBlue\Prim\Scalars\NumericObject
     */
    function numeric($value = 0): NumericObject
    {
        if (is_float($value)) {
            return new FloatObject($value);
        }

        return new IntObject($value);
    }
}

/**
 * StringObject helper function
 */
if (!function_exists('string')) {
    /**
     * Create a new StringObject.
     *
     * @param string|StringObject $value
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    function string($value = ''): StringObject
    {
        return new StringObject($value);
    }
}
