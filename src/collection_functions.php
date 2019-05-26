<?php

declare(strict_types=1);

namespace NorseBlue\Prim;

use NorseBlue\Prim\Collections\ArrObject;
use NorseBlue\Prim\Collections\DotArrObject;

/**
 * DotArr helper function
 */
if (!function_exists('dotarr')) {
    /**
     * Create a new DotArr.
     *
     * @param iterable<mixed> $value
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
     * @param iterable<mixed> $value
     *
     * @return \NorseBlue\Prim\Collections\ArrObject
     */
    function arr(iterable $value = []): ArrObject
    {
        return new ArrObject($value);
    }
}
