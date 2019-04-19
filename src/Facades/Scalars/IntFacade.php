<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Scalars\IntObject;

/**
 * Class IntFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 */
class IntFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = IntObject::class;
}
