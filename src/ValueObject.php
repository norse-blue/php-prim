<?php

namespace NorseBlue\Prim;

use NorseBlue\Prim\Contracts\ValueObject as ValueObjectContract;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Traits\HasPropertyAccessors;
use NorseBlue\Prim\Traits\HasPropertyMutators;

/**
 * Class ValueObject
 *
 * @package NorseBlue\Prim
 *
 * @property mixed $value
 */
class ValueObject implements ValueObjectContract
{
    use HasPropertyAccessors;
    use HasPropertyMutators;

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
     * Converts the object to string by casting the value.
     *
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->object_value;
    }

    // endregion Magic Methods

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
