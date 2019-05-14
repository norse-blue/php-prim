<?php

namespace NorseBlue\Prim\Collections;

use Closure;
use NorseBlue\Prim\Contracts\DotArrayAccess;

/**
 * Class DotArray
 *
 * @package NorseBlue\Prim\Collections
 */
class DotArray extends SimpleArray implements DotArrayAccess
{
    //region ===== Overrides =====

    /**
     * @inheritDoc
     */
    public function has(string $key): bool
    {
        if (parent::has($key)) {
            return true;
        }

        return (bool)$this->dotTraverseCallback($key);
    }

    /**
     * @inheritDoc
     */
    public function get(string $key)
    {
        if (parent::has($key)) {
            return $this->items[$key];
        }

        return $this->dotTraverseCallback($key, function ($item) {
            return $item;
        });
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, $value): void
    {
        if (strpos($key, '.') === false) {
            $this->items[$key] = $value;
            return;
        }

        $this->dotTraverseCallback($key, function ($item, &$parent, $key_part) use ($value) {
            $parent[$key_part] = $value;
        }, true);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $key): void
    {
        if (parent::has($key)) {
            unset($this->items[$key]);
        }

        $this->dotTraverseCallback($key, function ($item, &$parent, $key_part) {
            unset($parent[$key_part]);
        });
    }

    //endregion

    /**
     * Traverse the array using dot-notation and execute the given callback.
     *Callback signature: mixed callable($item, $parent, $key_part, $full_key)
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
        $array = &$this->items;
        $key_part = '';

        foreach ($this->getKeyParts($key) as $key_part) {
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
     * @inheritDoc
     */
    public function getKeyParts(string $key): array
    {
        return explode('.', $key);
    }

    //endregion
}
