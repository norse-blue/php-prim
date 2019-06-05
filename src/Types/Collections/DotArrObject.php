<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Collections;

use ArrayAccess;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Traits\Collections\ContainsDotItems;
use NorseBlue\Prim\Traits\Collections\TraversesDotItems;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Primitive type array as object with dot-notation access.
 */
class DotArrObject extends ItemContainer implements ArrayAccess, Jsonable
{
    // region === Traits ===

    use ContainsDotItems;
    use TraversesDotItems;

    // endregion Traits

    // region === Properties ===

    /** @inheritDoc */
    protected static $extensions = [];

    // endregion Properties

    // region === implements Jsonable ===

    /**
     * @inheritDoc
     */
    final public function toJson(?int $options = 0, $depth = 512): StringObject
    {
        return string(json_encode($this->items, $options, $depth));
    }

    // endregion
}
