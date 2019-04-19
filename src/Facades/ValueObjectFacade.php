<?php

namespace NorseBlue\Prim\Facades;

use BadMethodCallException;
use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\ValueObject;
use RuntimeException;

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
        if (!is_string($class) || $class === '' || !class_exists($class)) {
            throw new RuntimeException('A valid facade class has not been set.');
        }

        if (!method_exists($class, $method)) {
            throw new BadMethodCallException("The method $method does not exist for class $class.");
        }

        if (!is_subclass_of($class, ValueObject::class)) {
            throw new InvalidFacadeClassException("The class $class does not extend class " . ValueObject::class . '.');
        }

        if (in_array($method, array_merge(self::$statics, static::$statics), true)) {
            return $class::$method(...$arguments);
        }

        $value = array_shift($arguments);

        return (new $class($value))->$method(...$arguments);
    }

    // endregion Magic Methods
}
