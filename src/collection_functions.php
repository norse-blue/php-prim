<?php

namespace NorseBlue\Prim;

use NorseBlue\Prim\Collections\DotArrObject;
use NorseBlue\Prim\Collections\ArrObject;

/**
 * DotArr helper function
 */
if (!function_exists('dotarr')) {
    /**
     * Create a new DotArr.
     *
     * @param iterable $value
     *
     * @return \NorseBlue\Prim\Collections\DotArrObject
     */
    function dotarr(iterable $value = []): DotArrObject
    {
        return new DotArrObject($value);
    }
}

/**
 * Arr helper function
 */
if (!function_exists('arr')) {
    /**
     * Create a new SimpleObject.
     *
     * @param iterable $value
     *
     * @return \NorseBlue\Prim\Collections\ArrObject
     */
    function arr(iterable $value = []): ArrObject
    {
        return new ArrObject($value);
    }
}
