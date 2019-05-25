<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Traits\Collections;

use Closure;

/**
 * Trait TraversesItemsWithDot
 *
 * @package NorseBlue\Prim\Traits\Collections
 */
trait TraversesDotItems
{
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

    /**
     * @inheritDoc
     */
    public function getKeyParts(string $key): array
    {
        return explode('.', $key);
    }
}
