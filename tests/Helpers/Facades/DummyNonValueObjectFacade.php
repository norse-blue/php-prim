<?php

namespace NorseBlue\Prim\Tests\Helpers\Facades;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Tests\Helpers\DummyNonValueObject;

/**
 * Class DummyNonValueObjectFacade
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
class DummyNonValueObjectFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = DummyNonValueObject::class;
}
