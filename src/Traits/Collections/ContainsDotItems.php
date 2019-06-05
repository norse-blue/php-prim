<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Traits\Collections;

/**
 * Overrides ContainsItems trait methods for dot-notation arrays.
 */
trait ContainsDotItems
{
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

        return $this->dotTraverseCallback(
            $key,
            static function ($item) {
                return $item;
            }
        );
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

        $this->dotTraverseCallback(
            $key,
            static function ($item, &$parent, $key_part) use ($value): void {
                $parent[$key_part] = $value;
            },
            true
        );
    }

    public function delete(string $key): void
    {
        if (parent::has($key)) {
            unset($this->items[$key]);
        }

        $this->dotTraverseCallback(
            $key,
            static function ($item, &$parent, $key_part): void {
                unset($parent[$key_part]);
            }
        );
    }
}
