<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Collections\Extensions\Arr;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Collections\ArrObject;

/**
 * Class ArrEachExtension
 *
 * @package NorseBlue\Prim\Collections\Extensions\Arr
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
         * @return \NorseBlue\Prim\Collections\Extensions\Arr\ArrEachExtension
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
