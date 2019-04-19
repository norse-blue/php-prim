<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\Facade;
use NorseBlue\Prim\Scalars\IntObject;

/**
 * Class IntFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 */
class IntFacade extends Facade
{
    /** @inheritDoc */
    protected static $class = IntObject::class;
}
