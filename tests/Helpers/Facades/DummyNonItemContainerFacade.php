<?php

namespace NorseBlue\Prim\Tests\Helpers\Facades;

use NorseBlue\Prim\Facades\ItemContainerFacade;
use NorseBlue\Prim\Tests\Helpers\DummyNonItemContainer;

/**
 * @method static privateDummy()
 * @method static protectedDummy()
 * @method static publicDummy()
 * @method static privateStaticDummy()
 * @method static protectedStaticDummy()
 * @method static publicStaticDummy()
 */
class DummyNonItemContainerFacade extends ItemContainerFacade
{
    /** @inheritDoc */
    protected static $class = DummyNonItemContainer::class;
}
