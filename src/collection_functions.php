<?php

namespace NorseBlue\Prim;

use NorseBlue\Prim\Collections\DotArr;
use NorseBlue\Prim\Collections\Arr;

/**
 * DotArr helper function
 */
if (!function_exists('dotarr')) {
    /**
     * Create a new DotArr.
     *
     * @param iterable $value
     *
     * @return \NorseBlue\Prim\Collections\DotArr
     */
    function dotarr(iterable $value = []): DotArr
    {
        return new DotArr($value);
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
     * @return \NorseBlue\Prim\Collections\Arr
     */
    function arr(iterable $value = []): Arr
    {
        return new Arr($value);
    }
}
