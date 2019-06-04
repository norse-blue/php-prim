<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types;

use NorseBlue\ExtensibleObjects\Contracts\Creatable;
use NorseBlue\ExtensibleObjects\Contracts\Extensible;
use NorseBlue\ExtensibleObjects\Traits\HandlesExtensionMethods;
use NorseBlue\Prim\Exceptions\InvalidValueException;
use NorseBlue\Prim\Traits\HasPropertyAccessors;
use NorseBlue\Prim\Traits\HasPropertyMutators;

/**
 * Defines an extensible value object.
 *
 * @property mixed $value
 */
class ValueObject implements Creatable, Extensible
{
    // region === Traits ===

    use HandlesExtensionMethods;
    use HasPropertyAccessors;
    use HasPropertyMutators;

    // endregion Traits

    // region === Properties ===

    /** @var mixed the value of the object. */
    protected $value;

    // endregion Properties

    // region === Constructor ===

    /**
     * @param mixed $value
     */
    public function __construct($value = null)
    {
        $value = static::unwrap($value);

        $this->setValueProperty($value);
    }

    // endregion Constructor

    // region === Property Accessors ===

    /**
     * Get the value.
     *
     * @return mixed
     */
    final protected function getValueProperty()
    {
        return $this->value;
    }

    // endregion Property Accessors

    // region === Property Mutators ===

    /**
     * Set the value.
     *
     * @param mixed $value
     */
    final protected function setValueProperty($value): void
    {
        if (!$value instanceof static && !$this->valueIsValid($value)) {
            throw new InvalidValueException('The given value is not valid.');
        }

        $this->value = static::unwrap($value);
    }

    // endregion Property Mutators

    // region === Methods ===

    /**
     * Unwraps the value from a ValueObject or returns the value itself.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    final public static function unwrap($value)
    {
        if ($value instanceof static) {
            $value = $value->value;
        }

        return $value;
    }

    /**
     * Check that the given value is valid.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function valueIsValid($value): bool
    {
        return true;
    }

    // endregion Methods

    // region === Magic Methods ===

    /**
     * Converts the object to string by casting the value.
     *
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }

    // endregion Magic Methods

    // region === implements Creatable ===

    /**
     * Creates a new instance.
     *
     * @param mixed $value
     *
     * @return static
     */
    public static function create($value = null): self
    {
        return new static($value);
    }

    // endregion Creatable
}
