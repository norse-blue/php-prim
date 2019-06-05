<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Traits;

use OutOfBoundsException;

/**
 * Container methods for item handling.
 */
trait ContainsItems
{
    // region Properties ===

    /** @var array<mixed> Items */
    protected $items = [];

    // endregion Properties

    // region === Methods ===

    /**
     * Get all items.
     *
     * @return array<mixed>
     */
    final public function all(): array
    {
        return $this->items;
    }

    /**
     * Verifies if the item exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Get the item with the given key.
     *
     * @param string $key
     *
     * @return mixed
     *
     * @throws \OutOfBoundsException
     */
    public function get(string $key)
    {
        if (!array_key_exists($key, $this->items)) {
            throw new OutOfBoundsException("The key '$key' does not exist in the collection.");
        }

        return $this->items[$key];
    }

    /**
     * Set the item with the given key.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function set(string $key, $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * Delete the item with the given key.
     *
     * @param string $key
     *
     * @return void
     */
    public function delete(string $key): void
    {
        unset($this->items[$key]);
    }

    /**
     * Clears the items.
     *
     * @return void
     */
    final public function clear(): void
    {
        $this->items = [];
    }

    // endregion Methods

    // region === implements Countable ===

    /**
     * Get the item count.
     *
     * @return int
     */
    final public function count(): int
    {
        return count($this->items);
    }

    // endregion implements Countable
}
