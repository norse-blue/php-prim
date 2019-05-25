<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Contracts;

use ArrayAccess;

/**
 * Interface DotArrayAccess
 *
 * @package NorseBlue\Prim\Contracts
 */
interface DotArrayAccess extends ArrayAccess
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
