<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Collections\Arr;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Collections\ArrObject;

/**
 * Class ArrEachExtension
 *
 * @package NorseBlue\Prim\Extensions\Collections\Arr
 */
class ArrEachExtension extends ArrObject implements ExtensionMethod
{
    /**
     * @return callable(callable($item, $key) $callback): Arr
     */
    public function __invoke(): callable
    {
        /**
         * Execute a callback over each item.
         *
         * @param callable($item, $key) $callback
         *
         * @return \NorseBlue\Prim\Extensions\Collections\Arr\ArrEachExtension
         */
        return function (callable $callback): ArrObject {
            foreach ($this->items as $key => $item) {
                if ($callback($item, $key) === false) {
                    break;
                }
            }

            return $this;
        };
    }
}
