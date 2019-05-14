<?php

namespace NorseBlue\Prim\Contracts;

interface DotArrayAccess
{
    /**
     * Get the key parts.
     *
     * @param string $key
     *
     * @return array
     */
    public function getKeyParts(string $key): array;
}
