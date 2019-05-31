<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Collections;

use Countable;
use NorseBlue\ExtensibleObjects\Contracts\Extensible;
use NorseBlue\ExtensibleObjects\Traits\HandlesExtensionMethods;
use NorseBlue\Prim\Traits\ContainsItems;

/**
 * Class ItemContainer
 *
 * @package NorseBlue\Prim\Types\Collections
 */
class ItemContainer implements Countable, Extensible
{
    use ContainsItems;
    use HandlesExtensionMethods;

    /**
     * ItemContainer constructor.
     *
     * @param iterable<mixed> $items
     */
    public function __construct(iterable $items = [])
    {
        $this->items = (array)$items;
    }
}
