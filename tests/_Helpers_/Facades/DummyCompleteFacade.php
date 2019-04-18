<?php

namespace NorseBlue\Prim\Tests\_Helpers_\Facades;

use NorseBlue\Prim\Facades\Facade;

/**
 * Class DummyCompleteFacade
 *
 * @package NorseBlue\Prim\Tests\Unit\Facade
 *
 * @method static dummy()
 * @method static staticDummy()
 */
class DummyCompleteFacade extends Facade
{
    /** @inheritDoc */
    protected static $class = DummyObject::class;

    /** @inheritDoc */
    protected static $statics = [
        'staticDummy',
    ];
}
