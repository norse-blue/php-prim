<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Functions;

use NorseBlue\Prim\Types\Collections\ArrObject;
use NorseBlue\Prim\Types\Collections\DotArrObject;

/**
 * Create a new DotArr.
 *
 * @param iterable<mixed> $value
 *
 * @return \NorseBlue\Prim\Types\Collections\DotArrObject
 */
function dotarr(iterable $value = []): DotArrObject
{
    return new DotArrObject($value);
}

/**
 * Create a new SimpleObject.
 *
 * @param iterable<mixed> $value
 *
 * @return \NorseBlue\Prim\Types\Collections\ArrObject
 */
function arr(iterable $value = []): ArrObject
{
    return new ArrObject($value);
}
