<?php

namespace NorseBlue\Prim\Traits\Collections;

/**
 * Trait ContainsDotItems
 *
 * @package NorseBlue\Prim\Traits\Collections
 */
trait ContainsDotItems
{
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
}
