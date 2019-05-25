<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Contracts;

interface Jsonable
{
    /**
     * Convert the object to json.
     *
     * @param int $options
     * @param int $depth
     *
     * @return string
     */
    public function toJson(int $options = 0, $depth = 512): string;
}
