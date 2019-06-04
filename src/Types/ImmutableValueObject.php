<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types;

use NorseBlue\Prim\Exceptions\ImmutablePropertyException;

/**
 * Defines an immutable value object.
 *
 * @property-read mixed $value
 */
class ImmutableValueObject extends ValueObject
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $extensions = [];

    // endregion Properties

    // region === Overrides ===

    /**
     * @inheritDoc
     */
    final public function __set(string $key, $value): void
    {
        if ($key === 'value') {
            throw new ImmutablePropertyException($key, "The '$key' property is immutable.");
        }

        parent::__set($key, $value);
    }

    // endregion Overrides
}
