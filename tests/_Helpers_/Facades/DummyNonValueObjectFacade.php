<?php

namespace NorseBlue\Prim\Tests\_Helpers_\Facades;

use NorseBlue\Prim\Facades\ValueObjectFacade;

/**
 * Class DummyNonValueObjectFacade
 *
 * @package NorseBlue\Prim\Tests\Unit\ValueObjectFacade
 *
 * @method static dummy()
 */
class DummyNonValueObjectFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = DummyNonValueObject::class;
}
