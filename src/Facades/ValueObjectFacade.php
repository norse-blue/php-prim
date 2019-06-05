<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades;

use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\Types\ValueObject;

/**
 * Facade base class for value objects.
 *
 * @method static ValueObject create(mixed $value)
 * @method static mixed unwrap(mixed $value)
 */
abstract class ValueObjectFacade extends Facade
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $class = ValueObject::class;

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
