<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Collections;

use NorseBlue\Prim\Contracts\DotArrayAccess;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Traits\Collections\ContainsDotItems;
use NorseBlue\Prim\Traits\Collections\TraversesDotItems;
use NorseBlue\Prim\Traits\ContainerArrayAccess;

/**
 * Class DotArrObject
 *
 * @package NorseBlue\Prim\Collections
 */
class DotArrObject extends ItemContainer implements DotArrayAccess, Jsonable
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
