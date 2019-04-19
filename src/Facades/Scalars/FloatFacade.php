<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\Facade;
use NorseBlue\Prim\Scalars\FloatObject;

/**
 * Class FloatFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 */
class FloatFacade extends Facade
{
    /** @inheritDoc */
    protected static $class = FloatObject::class;
}
