<?php

namespace NorseBlue\Prim\Facades\Collections;

use NorseBlue\Prim\Collections\ArrObject;
use NorseBlue\Prim\Facades\ItemContainerFacade;
use NorseBlue\Prim\Scalars\IntObject;

/**
 * Class ArrFacade
 *
 * @package NorseBlue\Prim\Facades\Collections
 *
 * @method static IntObject average(array|ArrObject $value, int|IntObject $decimals = 0)
 * @method static ArrObject each(array|ArrObject $value, callable $callback)
 */
class ArrFacade extends ItemContainerFacade
{
    /** @inheritDoc */
    protected static $class = ArrObject::class;
}
