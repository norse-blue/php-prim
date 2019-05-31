<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades;

use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\Types\ValueObject;

/**
 * Class ValueObjectFacade
 *
 * @package NorseBlue\Prim\Facades
 *
 * @method static mixed unwrap(mixed $value)
 */
abstract class ValueObjectFacade extends Facade
{
    /** @var string The class that this facade is for. */
    protected static $class = ValueObject::class;

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
