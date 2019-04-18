<?php

namespace NorseBlue\Prim\Facades;

use RuntimeException;

/**
 * Class Facade
 *
 * @package NorseBlue\Prim\Facades
 */
abstract class Facade
{
    /** @var string The class that this facade is for. */
    protected static $class;

    /** @var array The name of the methods that are actually static. */
    protected static $statics = [];

    // region === Magic Methods ===

    /**
     * @inheritDoc
     */
    public static function __callStatic(string $method, array $arguments)
    {
        $class = static::$class;
        if (!is_string($class) || $class === '' || !class_exists($class)) {
            throw new RuntimeException('A valid facade class has not been set.');
        }

        if (in_array($method, static::$statics, true)) {
            return $class::$method(...$arguments);
        }

        $value = array_shift($arguments);

        return (new $class($value))->$method(...$arguments);
    }

    // endregion Magic Methods
}
