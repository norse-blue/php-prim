<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Collections;

use ArrayAccess;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Traits\ContainerArrayAccess;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;

/**
 * Class ArrObject
 *
 * @package NorseBlue\Prim\Types\Collections
 *
 * @method IntObject average(int|IntObject $decimals = 0)
 * @see \NorseBlue\Prim\Extensions\Collections\Arr\ArrAverageExtension
 * @method BoolObject contains(mixed $needle, bool|BoolObject $strict = false)
 * @see \NorseBlue\Prim\Extensions\Collections\Arr\ArrContainsExtension
 * @method self each(callable $callback)
 * @see \NorseBlue\Prim\Extensions\Collections\Arr\ArrEachExtension
 *
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
