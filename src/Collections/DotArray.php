<?php

namespace NorseBlue\Prim\Collections;

use Closure;
use NorseBlue\Prim\Contracts\DotArrayAccess;
use NorseBlue\Prim\ValueObject;
use RuntimeException;

/**
 * Class DotArray
 *
 * @package NorseBlue\Prim\Collections
 */
class DotArray extends ValueObject implements DotArrayAccess
{
    /**
     * DotArray constructor.
     *
     * @param iterable $items
     */
    public function __construct(iterable $items = [])
    {
        parent::__construct($items);
    }

    //region ===== Overrides =====

    /**
     * @inheritDoc
     */
    public function valueIsValid($value): bool
    {
        return is_iterable($value);
    }

    /**
     * @inheritDoc
     */
    final public function __set(string $key, $value): void
    {
        throw new RuntimeException('The DotArray value cannot be directly changed.');
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return json_encode($this->object_value);
    }

    //endregion

    /**
     * Clear the array.
     */
    final public function clear(): void
    {
        $this->object_value = [];
    }

    /**
     * Verifies if the array has the given key.
     *
     * @param string $key
     *
     * @return bool
     */
    final public function has(string $key): bool
    {
        if (array_key_exists($key, $this->object_value)) {
            return true;
        }

        return (bool)$this->dotTraverseCallback($key);
    }

    /**
     * Get an item value.
     *
     * @param string $key
     *
     * @return mixed
     */
    final public function get(string $key)
    {
        if (array_key_exists($key, $this->object_value)) {
            return $this->object_value[$key];
        }

        return $this->dotTraverseCallback($key, function ($item) {
            return $item;
        });
    }

    /**
     * Set an item value.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    final public function set(string $key, $value): void
    {
        if (strpos($key, '.') === false) {
            $this->object_value[$key] = $value;
            return;
        }

        $this->dotTraverseCallback($key, function ($item, &$parent, $key_part) use ($value) {
            $parent[$key_part] = $value;
        }, true);
    }

    /**
     * Delete an item.
     *
     * @param string $key
     *
     * @return void
     */
    final public function delete(string $key): void
    {
        if (array_key_exists($key, $this->object_value)) {
            unset($this->object_value[$key]);
        }

        $this->dotTraverseCallback($key, function ($item, &$parent, $key_part) {
            unset($parent[$key_part]);
        });
    }

    /**
     * Traverse the array using dot-notation and execute a callback
     * on the found item.
     *
     * The callback is passed this params in this order: $item, $parent, $key_part, $full_key
     *
     * @param string $key
     * @param \Closure|null $callback
     *
     * @param bool $create_missing
     *
     * @return mixed Return null if the item was not found, true if it was found but no callback was given and
     * the callback return value if it was found and a callback was given.
     */
    final protected function dotTraverseCallback(string $key, Closure $callback = null, $create_missing = false)
    {
        $parent = [];
        $array = &$this->object_value;
        $key_part = '';

        foreach (explode('.', $key) as $key_part) {
            if (trim($key_part) === '') {
                continue;
            }

            $parent = &$array;
            if (!is_array($parent)) {
                if (!$create_missing) {
                    return ($callback) ? $callback($array, $parent, $key_part, $key) : null;
                }

                $parent = [];
                $parent[$key_part] = null;
            }

            if (!array_key_exists($key_part, $parent)) {
                break;
            }

            $array = &$parent[$key_part];
        }

        return ($callback) ? $callback($array, $parent, $key_part, $key) : array_key_exists($key_part, $parent);
    }

    //region ===== DotArrayAccess =====

    /**
     * Whether a offset exists
     *
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset): bool
    {
        return $this->has($offset);
    }

    /**
     * Offset to retrieve
     *
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Offset to set
     *
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * Offset to unset
     *
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        $this->delete($offset);
    }

    //endregion ArrayAccess
}
