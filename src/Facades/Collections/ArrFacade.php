<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Collections;

use NorseBlue\Prim\Types\Collections\ArrObject;
use NorseBlue\Prim\Facades\ItemContainerFacade;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\IntObject;

/**
 * Class ArrFacade
 *
 * @package NorseBlue\Prim\Facades\Collections
 *
 * @method static IntObject average(array|ArrObject $value, int|IntObject $decimals = 0)
 * @method static BoolObject contains(array|ArrObject $value, mixed $needle, bool|BoolObject $strict = false)
 * @method static ArrObject each(array|ArrObject $value, callable $callback)
 */
class ArrFacade extends ItemContainerFacade
{
    /** @inheritDoc */
    protected static $class = ArrObject::class;
}
