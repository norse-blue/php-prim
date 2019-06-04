<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades;

use BadMethodCallException;
use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\Types\ValueObject;

/**
 * Facade base class.
 *
 * @method static mixed create(mixed $value)
 */
abstract class Facade
{
    // region === Properties ===

    /** @var string The class that this facade is for. */
    protected static $class = '';

    /** @var array<string> The name of the methods that are actually static. */
    protected static $statics = [
        'create',
        'unwrap',
    ];

    // endregion Properties

    // region === Constructor ===

    /**
     * Prevent construction outside this class.
     *
     * @codeCoverageIgnore
     */
    final private function __construct()
    {
    }

    // endregion Constructor

    // region === Methods ===

    /**
     * Validate the facade class.
     *
     * @param string $class
     *
     * @return void
     *
     * @throws \NorseBlue\Prim\Exceptions\InvalidFacadeClassException
     */
    final protected static function validateFacadeClass(string $class): void
    {
        if (!is_string($class) || $class === '' || !class_exists($class)) {
            throw new InvalidFacadeClassException('A valid facade class has not been set.');
        }

        static::validateFacadeClassType($class);
    }

    /**
     * Validate the facade class type.
     *
     * @param string $class
     *
     * @return void
     */
    abstract protected static function validateFacadeClassType(string $class): void;

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

    // endregion Methods

    // region === Magic Methods ===

    /**
     * Handle static method calls.
     *
     * @param string $method
     * @param array<mixed> $arguments
     *
     * @return mixed
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
}
