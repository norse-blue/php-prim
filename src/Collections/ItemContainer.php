<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Collections;

use NorseBlue\ExtensibleObjects\Contracts\Extensible;
use NorseBlue\ExtensibleObjects\Traits\HandlesExtensionMethods;
use NorseBlue\Prim\Contracts\ItemContainable;
use NorseBlue\Prim\Traits\ContainsItems;

/**
 * Class ItemContainer
 *
 * @package NorseBlue\Prim\Collections
 */
class ItemContainer implements ItemContainable, Extensible
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
