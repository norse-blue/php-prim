<?php

namespace NorseBlue\Prim\Tests\Helpers\Facades;

use NorseBlue\Prim\Facades\ValueObjectFacade;

/**
 * Class DummyInvalidFacade
 *
 * @package NorseBlue\Prim\Tests\Unit\ValueObjectFacade
 *
 * @method static privateDummy()
 * @method static protectedDummy()
 * @method static publicDummy()
 * @method static privateStaticDummy()
 * @method static protectedStaticDummy()
 * @method static publicStaticDummy()
 */
class DummyInvalidFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = '';
}
