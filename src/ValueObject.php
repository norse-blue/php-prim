<?php

namespace NorseBlue\Prim;

use NorseBlue\Prim\Contracts\ValueObject as ValueObjectContract;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Exceptions\PropertyNotFoundException;

/**
 * Class ValueObject
 *
 * @package NorseBlue\Prim
 *
 * @property mixed $value
 */
class ValueObject implements ValueObjectContract
{
    /** @var mixed The value of the object */
    protected $object_value;

    /**
     * ValueObject constructor.
     *
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $value = static::unwrap($value);

        $this->setValueProperty($value);
    }

    // region === Accessors ===

    /**
     * Get the value.
     *
     * @return mixed
     */
    final protected function getValueProperty()
    {
        return $this->object_value;
    }

    // endregion Accessors

    // region === Mutators ===

    /**
     * Set the value.
     *
     * @param mixed $value
     */
    final protected function setValueProperty($value): void
    {
        if (!$this->valueIsValid($value) || $value instanceof static) {
            throw new InvalidValueException('The given value is not valid.');
        }

        $this->object_value = $value;
    }

    // endregion Mutators

    // region === Magic Methods ===

    /**
     * Magic accessor.
     *
     * @param string $key
     *
     * @return mixed
     */
    final public function __get(string $key)
    {
        if ($this->hasAccessor($key, $accessor)) {
            return $this->$accessor();
        }

        throw new PropertyNotFoundException($key, 'The property or an accessor could not found.');
    }

    /**
     * Magic variable set check.
     *
     * @param string $key
     *
     * @return bool
     */
    final public function __isset(string $key): bool
    {
        if (!$this->hasAccessor($key, $accessor)) {
            throw new PropertyNotFoundException($key, 'The property was not found or is not accessible.');
        }

        $value = $this->$accessor();
        return isset($value);
    }

    /**
     * Magic mutator.
     *
     * @param string $key
     * @param mixed $value
     */
    public function __set(string $key, $value): void
    {

        if ($this->hasMutator($key, $mutator)) {
            $this->$mutator($value);
            return;
        }

        throw new PropertyNotFoundException($key, 'The property or a mutator could not found.');
    }

    /**
     * Converts the object to string by casting the value.
     *
     * @return string
     */
    final public function __toString(): string
    {
        return (string)$this->object_value;
    }

    // endregion Magic Methods

    /**
     * Checks if an accessor exists for the key.
     *
     * @param string $key
     * @param string|null $accessor optional Output parameter to get the accessor name.
     *
     * @return bool
     */
    final protected function hasAccessor(string $key, string &$accessor = null): bool
    {
        $accessor = 'get' . string($key)->studly() . 'Property';
        return method_exists($this, $accessor);
    }

    /**
     * Checks if a mutator exists for the key.
     *
     * @param string $key
     * @param string|null $mutator optional Output parameter to get the mutator name.
     *
     * @return bool
     */
    final protected function hasMutator(string $key, string &$mutator = null): bool
    {
        $mutator = 'set' . string($key)->studly() . 'Property';
        return method_exists($this, $mutator);
    }

    /**
     * Unwraps the value from a ValueObject or returns the value itself.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    final public static function unwrap($value)
    {
        if ($value instanceof self) {
            $value = $value->value;
        }

        return $value;
    }

    // region === ValueObjectContract ===

    /**
     * @inheritDoc
     */
    public function valueIsValid($value): bool
    {
        return true;
    }

    // endregion ValueObjectContract
}
