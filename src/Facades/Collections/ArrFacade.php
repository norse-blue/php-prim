<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Collections;

use NorseBlue\Prim\Facades\ItemContainerFacade;
use NorseBlue\Prim\Types\Collections\ArrObject;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;

/**
 * Facade to class ArrObject.
 *
 * @method static IntObject average(array|ArrObject $value, int|IntObject $decimals = 0)
 * @method static BoolObject contains(array|ArrObject $value, mixed $needle, bool|BoolObject $strict = false)
 * @method static ArrObject create(iterable $value)
 * @method static ArrObject each(array|ArrObject $value, callable $callback)
 */
class ArrFacade extends ItemContainerFacade
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $class = ArrObject::class;

    // endregion Properties
}
