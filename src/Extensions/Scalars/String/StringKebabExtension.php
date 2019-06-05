<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;

final class StringKebabExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Convert the value to kebab case.
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function (): StringObject {
            return $this->snake('-');
        };
    }
}
