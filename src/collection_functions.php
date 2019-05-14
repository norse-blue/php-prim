<?php

namespace NorseBlue\Prim;

use NorseBlue\Prim\Collections\DotArray;
use NorseBlue\Prim\Collections\SimpleArray;

/**
 * DotArray helper function
 */
if (!function_exists('dotarr')) {
    /**
     * Create a new DotArray.
     *
     * @param iterable $value
     *
     * @return \NorseBlue\Prim\Collections\DotArray
     */
    function dotarr(iterable $value = []): DotArray
    {
        return new DotArray($value);
    }
}

/**
 * SimpleArray helper function
 */
if (!function_exists('arr')) {
    /**
     * Create a new SimpleObject.
     *
     * @param iterable $value
     *
     * @return \NorseBlue\Prim\Collections\SimpleArray
     */
    function arr(iterable $value = []): SimpleArray
    {
        return new SimpleArray($value);
    }
}
