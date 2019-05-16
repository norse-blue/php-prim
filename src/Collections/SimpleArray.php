<?php

namespace NorseBlue\Prim\Collections;

use ArrayAccess;
use NorseBlue\ExtensibleObjects\Contracts\Extensible;
use NorseBlue\ExtensibleObjects\Traits\HandlesExtensionMethods;
use NorseBlue\Prim\Contracts\ItemContainer;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Traits\HasArrayAccessForItems;
use NorseBlue\Prim\Traits\ContainsItems;

/**
 * Class SimpleArray
 *
 * @package NorseBlue\Prim\Collections
 */
class SimpleArray implements ArrayAccess, Extensible, ItemContainer, Jsonable
{
    use ContainsItems;
    use HandlesExtensionMethods;
    use HasArrayAccessForItems;

    /**
     * SimpleArray constructor.
     *
     * @param iterable $items
     */
    public function __construct(iterable $items = [])
    {
        $this->items = (array)$items;
    }

    // region === Jsonable ===

    /**
     * @inheritDoc
     */
    final public function toJson(?int $options = 0, $depth = 512): string
    {
        return json_encode($this->items, $options, $depth);
    }

    // endregion
}
