<?php

namespace NorseBlue\Prim\Facades;

use BadMethodCallException;
use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\ValueObject;

/**
 * Class ValueObjectFacade
 *
 * @package NorseBlue\Prim\Facades
 *
 * @method static mixed unwrap(mixed $value)
 */
abstract class ValueObjectFacade
{
    /** @var string The class that this facade is for. */
    protected static $class = ValueObject::class;

    /** @var array The name of the methods that are actually static. */
    protected static $statics = [
        'unwrap',
    ];

    /**
     * ValueObjectFacade constructor.
     *
     * @codeCoverageIgnore
     */
    final private function __construct()
    {
    }

    // region === Magic Methods ===

    /**
     * @inheritDoc
     */
    final public static function __callStatic(string $method, array $arguments)
    {
        $class = static::$class;
        self::validateFacadeClass($class);
        self::validateFacadeMethod($class, $method);

        if (in_array($method, array_merge(self::$statics, static::$statics), true)) {
            return $class::$method(...$arguments);
        }

        return (new $class(array_shift($arguments)))->$method(...$arguments);
    }

    // endregion Magic Methods

    /**
     * Validate the facade class.
     *
     * @param string $class
     *
     * @throws \NorseBlue\Prim\Exceptions\InvalidFacadeClassException
     */
    final protected static function validateFacadeClass(string $class): void
    {
        if (!is_string($class) || $class === '' || !class_exists($class)) {
            throw new InvalidFacadeClassException('A valid facade class has not been set.');
        }

        if (!is_subclass_of($class, ValueObject::class)) {
            throw new InvalidFacadeClassException(
                sprintf('The class %s does not extend class %s.', $class, ValueObject::class)
            );
        }
    }

    /**
     * Validate the facade method.
     *
     * @param string $class
     * @param string $method
     */
    final protected static function validateFacadeMethod(string $class, string $method): void
    {
        /** @var ValueObject $class */
        if (!method_exists($class, $method) && !$class::hasExtensionMethod($method)) {
            throw new BadMethodCallException("The method $method does not exist for class $class.");
        }
    }
}
