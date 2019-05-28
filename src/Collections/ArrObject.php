<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Collections;

use ArrayAccess;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Traits\ContainerArrayAccess;

/**
 * Class ArrObject
 *
 * @package NorseBlue\Prim\Collections
 *
 * @method IntObject average(int|IntObject $decimals = 0)
 * @method BoolObject contains(mixed $needle, bool|BoolObject $strict = false)
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
