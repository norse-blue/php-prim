<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Collections;

use ArrayAccess;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Traits\Collections\ContainsDotItems;
use NorseBlue\Prim\Traits\Collections\TraversesDotItems;
use NorseBlue\Prim\Traits\ContainerArrayAccess;

/**
 * Class DotArrObject
 *
 * @package NorseBlue\Prim\Types\Collections
 */
class DotArrObject extends ItemContainer implements ArrayAccess, Jsonable
{
    use ContainsDotItems;
    use ContainerArrayAccess;
    use TraversesDotItems;

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
