<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Enums;

use NorseBlue\ExtensibleObjects\Contracts\Creatable;
use NorseBlue\Prim\Exceptions\Enums\InvalidEnumValueException;
use NorseBlue\Prim\Exceptions\ImmutablePropertyException;
use NorseBlue\Prim\Types\Collections\ArrObject;
use NorseBlue\Prim\Types\ImmutableValueObject;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\FloatObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use NorseBlue\Prim\Types\ValueObject;
use ReflectionClass;
use function NorseBlue\Prim\Functions\arr;
use function NorseBlue\Prim\Functions\string;

/**
 * @property-read StringObject $key
 *
 * @method BoolObject equals(int|IntObject|string|StringObject|Enum|null $enum)
 * @method BoolObject same(Enum $enum)
 */
abstract class Enum extends ImmutableValueObject implements Creatable
{
    /** @var null The default none enum value. */
    protected const NONE = null;

    // region === Properties ===

    /** @inheritDoc */
    protected static $extensions = [];

    /** @var ArrObject */
    protected static $cache;

    /** @var StringObject The enum key. */
    protected $key;

    // endregion Properties

    // region === Property Accessors ===

    /**
     * Get the enum key.
     *
     * @return \NorseBlue\Prim\Types\Scalars\StringObject
     */
    final protected function getKeyProperty(): StringObject
    {
        return $this->key;
    }

    // endregion Property Accessors

    // region === Property Mutators ===

    /**
     * Set the key property.
     */
    final protected function setKeyProperty(): void
    {
        throw new ImmutablePropertyException('key', 'The \'key\' property is immutable.');
    }

    // endregion Property Mutators

    // region === Overrides ===

    /**
     * Enum constructor.
     *
     * @param int|IntObject|float|FloatObject|string|StringObject|Enum|null $value
     *
     * @throws \ReflectionException
     */
    final protected function __construct($value = null)
    {
        parent::__construct(self::unwrap($value));
        $this->key = string(static::getCache()->key($this->value));
    }

    /**
     * @inheritDoc
     *
     * @throws \ReflectionException
     */
    public function valueIsValid($value): bool
    {
        if ($value === null || $value instanceof static) {
            return true;
        }

        $value = self::unwrap($value);
        if (!is_int($value) && !is_string($value) && !is_float($value)) {
            return false;
        }

        return static::getCache()->contains($value)->value;
    }

    // endregion === ImmutableValueObject Overrides ===

    // region === Methods ===

    /**
     * Get the values cache.
     *
     * @return ArrObject
     *
     * @throws \ReflectionException
     */
    protected static function getCache(): ArrObject
    {
        $class = static::class;

        if (static::$cache === null) {
            static::$cache = arr();
        }

        if (!static::$cache->has($class)) {
            $reflection = new ReflectionClass($class);
            static::$cache->set($class, arr($reflection->getConstants()));
        }

        return static::$cache[$class];
    }

    /**
     * Get enum keys.
     *
     * @return \NorseBlue\Prim\Types\Collections\ArrObject
     *
     * @throws \ReflectionException
     */
    public static function keys(): ArrObject
    {
        return static::getCache()->keys;
    }

    /**
     * Get enum values.
     *
     * @return \NorseBlue\Prim\Types\Collections\ArrObject
     *
     * @throws \ReflectionException
     */
    public static function values(): ArrObject
    {
        return static::getCache()->values;
    }

    /**
     * Check if the enum value is an empty string.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->value === '';
    }

    /**
     * Check if the enum value is null.
     *
     * @return bool
     */
    public function isNull()
    {
        return $this->value === null;
    }

    /**
     * Check if the enum value is zero.
     *
     * @return bool
     */
    public function isZero()
    {
        return $this->value === 0 || $this->value === 0.0;
    }

    // endregion Static

    // region === Magic Methods ===

    /**
     * Handle the static calls.
     *
     * @param string $name
     * @param array<mixed> $arguments
     *
     * @return \NorseBlue\Prim\Types\Enums\Enum
     *
     * @throws \ReflectionException
     */
    public static function __callStatic(string $name, array $arguments): Enum
    {
        $cache = static::getCache();
        if (!$cache->has($name)) {
            throw new InvalidEnumValueException(
                sprintf("The enum %s has no value %s defined.", static::class, $name)
            );
        }

        return new static($cache[$name]);
    }

    // endregion Magic Methods

    // region === implements Creatable ===

    /**
     * @param int|float|NumericObject|string|StringObject|Enum|null $value
     *
     * @return \NorseBlue\Prim\Types\ValueObject
     */
    public static function create($value = null): ValueObject
    {
        return parent::create($value);
    }

    // endregion Creatable
}
