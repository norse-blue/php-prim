<?php

declare(strict_types=1);

namespace NorseBlue\Prim;

use NorseBlue\Prim\Exceptions\ImmutableValueException;

/**
 * Class ImmutableValueObject
 *
 * @package NorseBlue\Prim
 */
class ImmutableValueObject extends ValueObject
{
    // region === Overrides ===

    /**
     * @inheritDoc
     */
    final public function __set(string $key, $value): void
    {
        if ($key === 'value') {
            throw new ImmutableValueException('This value object is immutable.');
        }

        parent::__set($key, $value);
    }

    // endregion Overrides
}
