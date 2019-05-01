<?php

namespace NorseBlue\Prim\Tests\Helpers\Facades;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Tests\Helpers\DummyValueObject;

/**
 * Class DummyCompleteFacade
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
abstract class DummyCompleteFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = DummyValueObject::class;

    /** @inheritDoc */
    protected static $statics = [
        'privateStaticDummy',
        'protectedStaticDummy',
        'publicStaticDummy',
    ];
}
