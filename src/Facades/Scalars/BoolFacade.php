<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Scalars\BoolObject;

/**
 * Class BoolFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 */
class BoolFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = BoolObject::class;
}
