<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Contracts;

use Countable;

interface ItemContainable extends Countable
{
    /**
     * Get all items.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Verifies if the collection has an item with the given key.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * Get an item from the collection.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key);

    /**
     * Set an item in the collection.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function set(string $key, $value): void;

    /**
     * Delete an item from the collection.
     *
     * @param string $key
     *
     * @return void
     */
    public function delete(string $key): void;

    /**
     * Clears the collection.
     *
     * @return void
     */
    public function clear(): void;
}
