<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Scalars\FloatObject;

/**
 * Class FloatFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 */
final class FloatFacade extends NumericFacade
{
    /** @inheritDoc */
    protected static $class = FloatObject::class;
}
