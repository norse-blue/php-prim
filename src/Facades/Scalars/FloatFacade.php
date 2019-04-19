<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Scalars\FloatObject;

/**
 * Class FloatFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 */
class FloatFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = FloatObject::class;
}
