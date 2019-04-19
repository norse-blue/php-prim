<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\Facade;
use NorseBlue\Prim\Scalars\BoolObject;

/**
 * Class BoolFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 */
class BoolFacade extends Facade
{
    /** @inheritDoc */
    protected static $class = BoolObject::class;
}
