<?php

namespace NorseBlue\Prim\Tests\_Helpers_\Facades;

use NorseBlue\Prim\Facades\ValueObjectFacade;

/**
 * Class DummyCompleteFacade
 *
 * @package NorseBlue\Prim\Tests\Unit\ValueObjectFacade
 *
 * @method static dummy()
 * @method static staticDummy()
 */
abstract class DummyCompleteFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = DummyValueObject::class;

    /** @inheritDoc */
    protected static $statics = [
        'staticDummy',
    ];
}
