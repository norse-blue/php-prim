<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Contracts;

use NorseBlue\Prim\Types\Collections\ArrObject;

/**
 * Defines the contract of a class that can be converted to array.
 */
interface Arrayable
{
    /**
     * convert the object to array.
     *
     * @return \NorseBlue\Prim\Types\Collections\ArrObject
     */
    public function toArray(): ArrObject;
}
