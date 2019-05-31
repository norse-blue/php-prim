<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades;

use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\Types\Collections\ItemContainer;

/**
 * Class ItemContainerFacade
 *
 * @package NorseBlue\Prim\Facades
 */
abstract class ItemContainerFacade extends Facade
{
    /** @inheritDoc */
    protected static $class = ItemContainer::class;

    /**
     * @inheritDoc
     */
    final protected static function validateFacadeClassType(string $class): void
    {
        if (!is_subclass_of($class, self::$class)) {
            throw new InvalidFacadeClassException(
                sprintf('The class %s does not extend class %s.', $class, static::$class)
            );
        }
    }
}
