<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Traits;

use NorseBlue\Prim\Exceptions\PropertyNotFoundException;

/**
 * Trait HasPropertyMutators
 *
 * @package NorseBlue\Prim\Traits
 */
trait HasPropertyMutators
{
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
     * Checks if a mutator exists for the key.
     *
     * @param string $key
     * @param string|null $mutator optional Output parameter to get the mutator name.
     *
     * @return bool
     */
    protected function hasMutator(string $key, ?string &$mutator = null): bool
    {
        $studly_key = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $key)));
        $mutator = 'set' . $studly_key . 'Property';

        return method_exists($this, $mutator);
    }
}
