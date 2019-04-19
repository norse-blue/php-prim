<?php

namespace NorseBlue\Prim\Tests\_Helpers_\Facades;

use NorseBlue\Prim\Facades\ValueObjectFacade;

/**
 * Class DummyInvalidFacade
 *
 * @package NorseBlue\Prim\Tests\Unit\ValueObjectFacade
 *
 * @method static dummy()
 */
class DummyInvalidFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = '';
}
