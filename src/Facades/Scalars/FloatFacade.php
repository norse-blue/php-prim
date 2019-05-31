<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Types\Scalars\FloatObject;

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
