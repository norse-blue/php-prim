<?php

namespace NorseBlue\Prim;

use NorseBlue\Prim\Collections\SimpleArray;

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
