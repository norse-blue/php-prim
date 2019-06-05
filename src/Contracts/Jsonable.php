<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Contracts;

use NorseBlue\Prim\Types\Scalars\StringObject;

/**
 * Defines the contract of a class that can be converted to JSON.
 */
interface Jsonable
{
    /**
     * Convert the object to json.
     *
     * @param int $options
     * @param int $depth
     *
     * @return \NorseBlue\Prim\Types\Scalars\StringObject
     */
    public function toJson(int $options = 0, int $depth = 512): StringObject;
}
