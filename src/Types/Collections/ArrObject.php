<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Collections;

use ArrayAccess;
use NorseBlue\Prim\Contracts\Jsonable;
use NorseBlue\Prim\Traits\ContainerArrayAccess;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\arr;
use function NorseBlue\Prim\Functions\string;

/**
 * Primitive type array as object.
 *
 * @property-read self $keys
 * @property-read self $values
 *
 * @method IntObject average(int|IntObject $decimals = 0) @see \NorseBlue\Prim\Extensions\Collections\Arr\ArrAverageExtension
 * @method BoolObject contains(mixed $needle, bool|BoolObject $strict = false) @see \NorseBlue\Prim\Extensions\Collections\Arr\ArrContainsExtension
 * @method self each(callable $callback) @see \NorseBlue\Prim\Extensions\Collections\Arr\ArrEachExtension
 */
class ArrObject extends ItemContainer implements ArrayAccess, Jsonable
{
    // region === Traits ===

    use ContainerArrayAccess;

    // endregion Traits

    // region === Properties ===

    /** @inheritDoc */
    protected static $extensions = [];

    // endregion Properties

    // region === Property Accessors ===

    /**
     * Get keys property.
     *
     * @return \NorseBlue\Prim\Types\Collections\ArrObject
     */
    final protected function getKeysProperty(): ArrObject
    {
        return arr(array_keys($this->items));
    }

    /**
     * Get values property.
     *
     * @return \NorseBlue\Prim\Types\Collections\ArrObject
     */
    final protected function getValuesProperty(): ArrObject
    {
        return arr(array_values($this->items));
    }

    //endregion Property Accessors

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
