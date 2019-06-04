<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades;

use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\Types\Collections\ItemContainer;

/**
 * Facade base class for item containers.
 *
 * @method static ItemContainer create(iterable $value)
 */
abstract class ItemContainerFacade extends Facade
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $class = ItemContainer::class;

    // endregion Properties

    // region === Overrides ===

    final protected static function validateFacadeClassType(string $class): void
    {
        if (!is_subclass_of($class, self::$class)) {
            throw new InvalidFacadeClassException(
                sprintf('The class %s does not extend class %s.', $class, static::$class)
            );
        }
    }

    // endregion Overrides
}
