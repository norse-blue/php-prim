<?php

namespace NorseBlue\Prim\Collections;

use ArrayAccess;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Traits\ContainerArrayAccess;

/**
 * Class ArrObject
 *
 * @package NorseBlue\Prim\Collections
 *
 * @method self each(callable $callback)
 */
class ArrObject extends ItemContainer implements ArrayAccess, Jsonable
{
    use ContainerArrayAccess;

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
